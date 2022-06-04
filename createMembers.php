<?php
//include_once "session.php";
$currentPage = "members.php";
include_once "navigation.php";
$pub = new Db();
if(isset($_POST) && (!empty($_POST['membName']) && !empty($_POST['email']) && !empty($_POST['phoneNo']))){
    $membName = $pub->sanitize($_POST['membName']);
    $email = $pub->sanitize($_POST['email']);
    $phoneNo = $pub->sanitize($_POST['phoneNo']);
    $res = $pub->createMembers($membName,$email,$phoneNo);

    if($res){
        $pub->msg =  '"<div class="alert alert-success d-flex align-items-center justify-content-center h6" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Successfully inserted data
        </div>
      </div>"';
    }
    else{
        $pub->msg =  "failed to insert data";
    }
}
// elseif(isset($_POST['submit']) && (empty($_POST['pubName']) || empty($_POST['country']) || empty($_POST['branches']))){
//    // $pub->msg = "<div class='d-flex bg-danger col-md-5 mt-1 justify-content-center  text-white'>Failed to  insert data</div>";
//     $pub->msg = "<div class='alert alert-danger d-flex align-items-center justify-content-center h6' role='alert'>
//     <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
//     <div>
//     Failed to insert data
//     </div>
//   </div>";
  
// }

?>
<div class="main">
    <h2 class="text-primary">Add Member</h2>
    <div class="border container" style="padding:30px">
        <form  method="post">
            <div class="form-group row d-flex justify-content-center">
                <div class="form-group col-md-6 ">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="membName" name="membName" placeholder="Member Name" >
                </div>
            

            </div>

            <div class="form-group row d-flex justify-content-center">            
                <div class="form-group col-md-6">
                    <label for="country">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" >
                </div>
            </div>

            <div class="form-group row d-flex justify-content-center">
            <div class="form-group col-md-6">
                    <label for="headquarter">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" >
                </div>
            
          
            </div>
            
            <div class="d-flex justify-content-center">   
                <input type="submit" name="submit" class="d-flex justify-content-center btn btn-primary col-md-5 col-md-offset-10  mt-3" value="submit" />  
            </div>
            <!-- <a class="btn btn-danger" href="publishers.php">Cancel</a> -->
        
        </form>
    </div>
</div>

</body>
</html>
</body>
</html>