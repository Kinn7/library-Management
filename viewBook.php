<?php
$currentPage = "books.php";
include "navigation.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $books = $db->getBookById($id)->fetch_object();
    $available = "No";
    if($books->available == 1){
        $available = "Yes";
    }
    
//    $fetch = $books->fetch_object();
}
?>

<div class="main">
    <div class="container">
    <div class="row">
        <div class="col p-3  d-flex justify-content-center">
            <?php
                echo "<img src='uploads/$books->book_img'>";
            ?>
   
        </div>
        </div>
   
        <div class="row">

        <!-- <div class="col d-flex justify-content-center">
                <?php //echo "<h4> $books->title </h4>"; ?>
            </div> -->
            <div class="w-100"></div>

        <div class="col d-flex justify-content-center">
        <?php echo "<h5><strong>Author</strong>: $books->author </h5>"; ?>
            </div>
            <div class="w-100"></div>

        <div class="col d-flex justify-content-center">
        <?php echo "<h5><strong>Isbn</strong>: $books->isbn </h5>"; ?>
            </div>
            <div class="w-100"></div>

        <div class="col d-flex justify-content-center">
        <?php echo "<h5><strong>Availability</strong>: $available </h5>"; ?>
            </div>
            <div class="w-100"></div>

        <div class="col d-flex justify-content-center">
        <?php echo "<h5><strong>Quantity</strong>: $books->quantity </h5>"; ?>
            </div>
            <div class="w-100"></div>

        <div class="col d-flex justify-content-center">
        <?php echo "<h5><strong>Price</strong>: $books->price </h5>"; ?>
            </div>
            <div class="w-100"></div>

        <div class="col d-flex justify-content-center">
        <?php echo "<h5><strong>Publisher</strong>: $books->pub_name </h5>"; ?>
            </div>

        </div>
    </div>

</div>

