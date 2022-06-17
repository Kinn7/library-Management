<?php
//define("IMAGE","uploads");
//include_once "session.php";
$currentPage = "books.php";
include_once "navigation.php";
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
    echo "<h5 class='card-title'>{$row->title}</h5>";
    echo "<p class='card-text'>Book Description.</p>";
    echo "<a href='viewBook.php?id={$row->bookid}' class='btn btn-success px-4'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></a>
    <a class='btn btn-danger px-4 '><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-trash-2'><polyline points='3 6 5 6 21 6'></polyline><path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path><line x1='10' y1='11' x2='10' y2='17'></line><line x1='14' y1='11' x2='14' y2='17'></line></svg></a>
    <a class='btn btn-primary px-4'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit'><path d='M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7'></path><path d='M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z'></path></svg></a>
    "
    ;
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

