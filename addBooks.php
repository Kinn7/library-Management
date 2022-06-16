<?php
$currentPage = "books.php";
include "navigation.php";
$db = new Db();
$publishers = $db->getPublishers();
if(isset($_POST['submit'])) //&& !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['isbn']) && !empty($_POST['price']) && !empty($_POST['available']) && !empty($_POST['qty'] && !empty($_POST['publisher'])) )
{
    $title = $db->sanitize($_POST['title']);
    $author = $db->sanitize($_POST['author']);
    $isbn = $db->sanitize($_POST['isbn']);
    $price = $db->sanitize($_POST['price']);
    $available = $db->sanitize($_POST['available']);
    $qty = $db->sanitize($_POST['qty']);
    $publisher = $db->sanitize($_POST['publisher']);
    $bookimg = $db->sanitize($_FILES['bookImg']['name']);

    $bookimgSize = $_FILES['bookImg']['size'];
    $bookimgError = $_FILES['bookImg']['error'];
    
    $getExtension = explode(".",$bookimg);
    $extension = strtolower(end($getExtension));
    $imgnewname=md5($bookimg.time()).".".$extension;
    
    $allowed_extensions = array("jpg","jpeg","png","gif");
    
    if(in_array($extension,$allowed_extensions))
    {
        if($bookimgError === 0){
            if($bookimgSize >= 5000){
            move_uploaded_file($_FILES["bookImg"]["tmp_name"],"uploads/".$imgnewname);
            }else{
                $db->msg = "file size must be 5mb or less";
            }
        }else{
             $db->msg = "something went wrong";
        }

    }
    $db->addBooks($imgnewname, $isbn, $author, $title, $price, $available, $qty, $publisher);

}

?>
<div class="main">

<h2 class="text-primary">Add Book</h2>
<div class="border container" style="padding:30px">
    <form  method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Book Name" >
            </div>
         
            <div class="form-group col-md-6">
                <label for="country">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Book Author" >
            </div>
        </div>

        <div class="form-group row">
        <div class="form-group col-md-6">
                <label for="headquarter">Isbn</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Book ISBN" >
            </div>
         
            <div class="form-group col-md-6">
                <label for="Number of branches">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Book Price" >
            </div>
        </div>

        <div class="form-group row">
        <div class="form-group col-md-6">
                <label for="headquarter">Availability</label>
                <input type="text" class="form-control" id="available" name="available" placeholder="Is Book Available" >
            </div>
         
            <div class="form-group col-md-6">
                <label for="Number of branches">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Number of Book" >
            </div>
        </div>
        <div class="form-group row">
        <div class="form-group col-md-6">
                <label for="headquarter">Publisher</label>
                <select class="form-select" name="publisher" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php 
                    foreach($publishers as $publisher){
                        echo "<option value=$publisher->pubId>$publisher->pub_name</option>";
                    }
                    ?>
                </select>
            </div>
         
            <div class="form-group col-md-6">
                <label for="Number of branches">Image</label>
                <input type="file" class="form-control" id="bookImg" name="bookImg" placeholder="Book Image" >
            </div>
        </div>
        
        <div class="d-flex justify-content-center">   
            <input type="submit" name="submit" class="d-flex justify-content-center btn btn-primary col-md-5 col-md-offset-10  mt-3" value="submit" />  
        </div>
        <!-- <a class="btn btn-danger" href="publishers.php">Cancel</a> -->
       
    </form>
</div>
</div>

</body>
</html>