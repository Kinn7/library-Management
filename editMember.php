<?php
$currentPage = "members.php";
include "navigation.php";
//include "classes/connection.php";

 $row = $db->editMembers();
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
    $membName = $db->sanitize($_POST['membName']);
    $email = $db->sanitize($_POST['email']);
    $phoneNo = $db->sanitize($_POST['phone_no']);
    $memberCode = $db->sanitize($_POST['member_code']);
    $membId = $db->sanitize($_GET['id']);

    if(isset($_POST['submit']) && !empty($_POST['membName'])){
    $query = "UPDATE members SET memb_name='$membName', email='$email', phone_no='$phoneNo', member_code='$memberCode' WHERE membId='$membId'";
    //$db->connect()->query($query);
    //header("Location: members.php");
    try{
        $rr = $db->connect()->query($query);
        if($rr){
            header("Location: members.php");
        }
        }catch(Exception $e){

            if($e->getCode() == 1062){
               $db->msg = "error";
                
            }
        }
        
  }else{
        $db->msg = "hello";
    }
 }
 
?>
<div class="main">
    <?php echo $db->msg; ?>
<h2 class="text-primary">Edit Members</h2>
<div class="border container" style="padding:30px">
    <form  method="post">
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="membName" name="membName" placeholder="Member Name" value="<?php echo $row->memb_name; ?>">
            </div>
         
            <div class="form-group col-md-6">
                <label for="country">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $row->email; ?>">
            </div>
        </div>

        <div class="form-group row">
        <div class="form-group col-md-6">
                <label for="headquarter">Phone Number</label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number" value="<?php echo $row->phone_no; ?>">
            </div>
         
            <div class="form-group col-md-6">
                <label for="Members">Member Id</label>
                <input type="text" class="form-control" id="member_code" name="member_code" placeholder="Member Id" value="<?php echo $row->member_code; ?>" >
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