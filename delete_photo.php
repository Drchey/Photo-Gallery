 <?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	
  if(empty($_GET['id'])) {
  	echo "No photograph ID was provided.";
    redirect_to('index.php');
  }

  $photo = Photograph::find_by_id($_GET['id']);
  if($photo && $photo->destroy()) {
    echo"<script>alert('Photo Deleted')</script>";
    redirect_to('list_photos.php');
    
  } else {
    echo"<script>alert('The photo could not be deleted.'')</script>";
    redirect_to('list_photos.php');
  }
  
?>
<?php if(isset($db)) { $db->close_connection(); } ?>
