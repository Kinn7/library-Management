<?php
$currentPage = "publishers.php";
include "navigation.php";
//include "classes/connection.php";
 $row = $db->editPublishers();
//  if(isset($_GET['id'])){
//     $id = $db->sanitize($_GET['id']);
//     $query = "SELECT * FROM publishers WHERE pubId='$id' LIMIT 1";
//     $res = $db->connect()->query($query);
//     if($res->num_rows){
//     $row = $res->fetch_object();
//     }else{
//         $query = "SELECT * FROM publishers WHERE pubId='1' LIMIT 1";
//         $res = $db->connect()->query($query);
//         $row = $res->fetch_object();
//     }

// }
if(isset($_POST['id']) ){ // && (!empty($_POST['pubName']) && !empty($_POST['country']) && !empty($_POST['branches']))){
    $pubName = $db->sanitize($_POST['pubName']);
    $country = $db->sanitize($_POST['country']);
    $headQuarter = $db->sanitize($_POST['headquarter']);
    $branches = $db->sanitize($_POST['branches']);
    $pubId = $db->sanitize($_GET['id']);

    if(isset($_POST['submit']) && !empty($_POST['pubName'])){
    $query = "UPDATE publishers SET pub_name='$pubName', country='$country', headquarter='$headQuarter', no_of_branch='$branches' WHERE pubId='$pubId'";
    $db->connect()->query($query);
    header("Location: publishers.php");
    }else{
        $db->msg = "hello";
    }
 }
 
?>
<div class="main">
    <?php echo $db->msg; ?>
<h2 class="text-primary">Edit publisher</h2>
<div class="border container" style="padding:30px">
    <form  method="post">
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="pubName" name="pubName" placeholder="Publisher Name" value="<?php echo $row->pub_name; ?>">
            </div>
         
            <div class="form-group col-md-6">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Publisher Country" value="<?php echo $row->country; ?>">
            </div>
        </div>

        <div class="form-group row">
        <div class="form-group col-md-6">
                <label for="headquarter">HeadQuarter</label>
                <input type="text" class="form-control" id="headquarter" name="headquarter" placeholder="City Name" value="<?php echo $row->headquarter; ?>">
            </div>
         
            <div class="form-group col-md-6">
                <label for="Number of branches">Number of branches</label>
                <input type="number" class="form-control" id="branches" name="branches" placeholder="no of branches" value="<?php echo $row->no_of_branch; ?>" >
            </div>
        </div>
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="d-flex justify-content-center">   
            <input type="submit" name="submit" class="d-flex justify-content-center btn btn-primary col-md-5 col-md-offset-10  mt-3" value="submit" />  
        </div>
        <!-- <a class="btn btn-danger" href="publishers.php">Cancel</a> -->
       
    </form>
</div>
</div>

</body>
</html>