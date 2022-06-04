<?php
//include_once "session.php";
$currentPage = "members.php";
include "navigation.php";

$pubs = new Db();

?>

<div class="main">
    <a href="createMembers.php" class="btn btn-primary p-2 mb-5 ">Add  Member</a>
    <h2 class="display3 d-flex justify-content-center mb-5">List of Members</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>Books Borrowed</th>
                <th>Member Id</th>
            </tr>
        </thead>
        <tbody>
           
                <?php $pubs->getMembers(); ?>
            
        </tbody>

    </table>
    
</p>
</div>

</body>
</html>