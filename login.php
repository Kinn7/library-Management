<?php
include "classes/connection.php";
$db->login();

// session_start();
// $_SESSION['user'] = '';
// $_SESSION['userId'] = '';
// include "classes/connection.php";
// $msg = "";
// if(isset($_POST['submit'])){
//     $connect = new Db();

//     $name = mysqli_real_escape_string($connect->connect(),$_POST['name']);
//     $pass = mysqli_real_escape_string($connect->connect(),$_POST['password']);
//     $pass = md5($pass);
    
//     $query = "SELECT * FROM admin WHERE name='$name' and password='$pass'";
//     $res = $connect->connect()->query($query);

//     if($res->num_rows){
//         $admin = $res->fetch_object();
//         $_SESSION['userId'] = $admin->id;
//         $_SESSION['user'] = $admin->name;
//         header("Location: dashboard.php");
//     }elseif(empty($_POST['name']) || empty($_POST['password'])){
//         $msg = "Field empty";
//     }
//     else{
//         $msg = "Wrong user or password";
//     }

    

// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <title>Login</title>
    <style>
        body{
            background-color: lightslategrey;
        }
    </style>
</head>

<body>
   <!-- <form method="POST" enctype="multipart/form-data"> -->

    <div class="container-lg bg-light py-5 " style="margin-top:10rem;">
	<div class="row justify-content-center ">

		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
        <h2 class="d-flex justify-content-sm-center" style="margin-right:8rem">Login</h2>
		<h6 class="d-flex justify-content-sm-center" style="margin-right:8rem;">admin/admin</h6>
			<div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="name"  class="form-control" id="password" placeholder="user name" />
			    </div>
			</div>
 
			<div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" name="password"  class="form-control" id="password" placeholder="password" />
			    </div>
			</div>
			<input type="submit" name="submit" class="btn btn-primary col-md-10 col-md-offset-10" value="submit" />
            <div class=" d-flex bg-danger col-md-10 mt-1 justify-content-center" style="color:white";><?php echo  $db->msg ?></div>
		</form>
	</div>
</div>

</body>
</html>
    <!-- </form>
</body>
</html>