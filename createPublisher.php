<?php
$currentPage = "publishers.php";
include "navigation.php";
$pub = new Db();
if(isset($_POST) && (!empty($_POST['pubName']) && !empty($_POST['country']) && !empty($_POST['branches']))){
    $pubName = $pub->sanitize($_POST['pubName']);
    $country = $pub->sanitize($_POST['country']);
    $headQuarter = $pub->sanitize($_POST['headquarter']);
    $branches = $pub->sanitize($_POST['branches']);
    $res = $pub->createPublishers($pubName,$country,$headQuarter,$branches);

    if($res){
        $pub->msg =  '"<div class="alert alert-success d-flex align-items-center justify-content-center h6" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Successfully inserted data
        </div>
      </div>"';
    }
    // else{
    //     $pub->msg =  "failed to insert data";
    // }
}elseif(isset($_POST['submit']) && (empty($_POST['pubName']) || empty($_POST['country']) || empty($_POST['branches']))){
   // $pub->msg = "<div class='d-flex bg-danger col-md-5 mt-1 justify-content-center  text-white'>Failed to  insert data</div>";
    $pub->msg = "<div class='alert alert-danger d-flex align-items-center justify-content-center h6' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div>
    Failed to insert data
    </div>
  </div>";
  
}

?>
<div class="main">
<?php echo $pub->msg; ?>
<h2 class="text-primary">Add publisher</h2>
<div class="border container" style="padding:30px">
    <form  method="post">
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="pubName" name="pubName" placeholder="Publisher Name" >
            </div>
         
            <div class="form-group col-md-6">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Publisher Country" >
            </div>
        </div>

        <div class="form-group row">
        <div class="form-group col-md-6">
                <label for="headquarter">HeadQuarter</label>
                <input type="text" class="form-control" id="headquarter" name="headquarter" placeholder="City Name" >
            </div>
         
            <div class="form-group col-md-6">
                <label for="Number of branches">Number of branches</label>
                <input type="number" class="form-control" id="branches" name="branches" placeholder="no of branches" >
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