 <?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	
  if(empty($_GET['id'])) {
  	echo "No User ID was provided.";
    redirect_to('index.php');
  }

  $user = User::find_by_id($_GET['id']);
  if($user && $user->delete()) {
    echo"<script>alert('user Deleted')</script>";
    redirect_to('list_users.php');
    
  } else {
    echo"<script>alert('The user could not be deleted.'')</script>";
    redirect_to('list_users.php');
  }
  
?>
<?php if(isset($db)) { $db->close_connection(); } ?>
