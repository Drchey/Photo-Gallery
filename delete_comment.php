 <?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	
  if(empty($_GET['id'])) {
  	echo "No comment ID was provided.";
    redirect_to('index.php');
  }

  $comment = Comment::find_by_id($_GET['id']);
  if($comment && $comment->delete()) {
    echo"<script>alert('Comment Deleted')</script>";
    redirect_to('list_photos.php');
    
  } else {
    echo"<script>alert('The photo could not be deleted.'')</script>";
    redirect_to('list_photos.php');
  }
  
?>
<?php if(isset($db)) { $db->close_connection(); } ?>
