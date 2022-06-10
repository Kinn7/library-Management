<?php
$currentPage = "publishers.php";
include "navigation.php";
$db = new Db();
?>
<div class="main">
    <?php
    $db->deleteMembers();
    ?>

</div>

