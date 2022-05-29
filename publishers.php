<?php
//include_once "session.php";
$currentPage = "publishers.php";
include "navigation.php";

$pubs = new Db();

?>

<div class="main">
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
            <tr>
                <?php $pubs->getPublishers(); ?>
            </tr>
        </tbody>

    </table>
    
</p>
</div>

</body>
</html>