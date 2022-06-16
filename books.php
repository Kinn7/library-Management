<?php
//define("IMAGE","uploads");
//include_once "session.php";
$currentPage = "books.php";
include_once "navigation.php";
$db = new Db();
$books = $db->getBooks();
?>
<div class="main">
<a href="addBooks.php" class="btn btn-primary p-2 mb-5 ">Add  Book</a>
<div class="container">
    <div class="row">
        <!-- <div class="col">
            <div class="card" style="width: 17rem;">
            <img src="uploads/8cc69dbaab5c29d8c58fe0eefd04160c.png " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
 -->

    <?php
    while($row = $books->fetch_object()){
    echo "<div class='col'>";
    echo "<div class='card mb-3' style='width: 17rem;'>";
            echo "<img src='uploads/$row->book_img' class='card-img-top' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Card title</h5>";
                echo "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";
                echo "<a href='#' class='btn btn-primary'>Go somewhere</a>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

    }




    
    ?>



</div>

</div>

    
</div>

</body>
</html>

