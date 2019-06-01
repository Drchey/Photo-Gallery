<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {
	redirect_to("login.php");
}

?>

<?php
if (isset($_POST['submit'])) {
	$photo = new Photograph();
	$photo->caption = $_POST['caption'];
	$photo->attach_file($_FILES['file_upload']);

	if ($photo->save()) {
		echo "<script>alert('Photo Saved')</script>";
    redirect_to("list_photos.php");

	}
	else{
		echo "<script>alert('Error While Uploading')</script>";
	}
}

?>


<?php include_layout_template('admin_header.php');?>
<?php include_layout_template('sidenavs.php');?>


<main style="margin-top: 0%; margin-left: 15%;">

<div class="row">
	<div class="col l3 s1 m0"></div>
	<div class="col l6 s10 m10 ">

		<div class = " card-panel white" style ="padding-left: 100px;padding-right:100px;margin-top: 70px;">
			<h4 class="center-align red-text" style="margin-bottom:12%;" ><i class="material-icons">add_a_photo</i>New Photo</h4>
		<form action="add_photo.php" autocomplete="off" enctype="multipart/form-data" method="POST">

      <div class="file-field input-field">
      <div class="btn red">
        <span>File</span>
        <input type="file" name="file_upload" value="1000000" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <br>

      <div class="input-field">
        <input type="text" name="caption" value="" required>
        <label for="caption">Caption</label>
      </div>

     
   
      <div class="row">
       <div class="input-field">
        <button type="submit" name="submit" class="btn-large center waves-effect waves-light red darken-2 col l12 s12 m12" style="margin-bottom:10%;margin-top:25%;">ADD PHOTO</button>
      </div>
    </div>

   
 
    </form>
    </div>
	</div>
</div>
  

</main>








<?php include_layout_template('admin_footer.php');?>

