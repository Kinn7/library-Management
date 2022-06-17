<?php
//include_once "session.php";
$currentPage = "publishers.php";
include "navigation.php";

//$db = new Db();
$publishers = $db->getPublishers();
//$rows =  $pubs->getPublishers()->pub_name;

?>

<div class="main">
    <a href="createPublisher.php" class="btn btn-primary p-2 mb-5 ">Add  Publisher</a>
    <h2 class="display3 d-flex justify-content-center mb-5">List of Publishers</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Publisher</th>
                <th>Country</th>
                <th>Headquarter</th>
                <th>No of branches</th>
            </tr>
        </thead>
        <tbody>
           
                <!-- < ? php//$pubs->getPublishers(); ?> -->
                <?php 
                //$rows = $pubs->getPublishers()->fetch_assoc();
                while( $publisher = $publishers->fetch_object())
                // foreach($publishers as $publisher)
                {
                echo " <tr>";
                echo "<td>" . $publisher->pub_name . "</td>" ;
                echo "<td>" . $publisher->country . "</td>" ;
                echo "<td>" . $publisher->headquarter . "</td>" ;
                echo "<td>" . $publisher->no_of_branch . "</td>" ;
                echo "<td> <a class='btn btn-success text-white' href='editPublisher.php?id={$publisher->pubId}' >" . "Edit" . "</a></td>"  ;
                echo "<td> <a class='btn btn-danger text-white' href='deletePublisher.php?id={$publisher->pubId}' >" . "Delete" . "</a></td>"  ;
                echo "</tr>";
                }
                //$publishers->free();
                ?>

            
        </tbody>

    </table>
    
</p>
</div>

</body>
</html>