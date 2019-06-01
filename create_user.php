<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {
	redirect_to("login.php");
}
?>
<?php
if (isset($_POST['submit'])) { 

$user = new User();

  $user->username = mysql_real_escape_string($_POST['username']);
  $user->first_name = mysql_real_escape_string($_POST['first_name']);
 $user->last_name = mysql_real_escape_string($_POST['last_name']);
 $user->password = mysql_real_escape_string($_POST['last_name']);

	
  if ($user->create()) {
    redirect_to("list_users.php");
  } else {
    
    echo "<script>alert('Data Could not be uploaded to Database')</script>";
  }
}else{
	echo " ";
}

  



?>


<?php include_layout_template('admin_header.php');?>
<?php include_layout_template('sidenavs.php');?>

<main style="margin-top: 0%; margin-left: 15%;">

<div class="row">
	<div class="col l3 s1 m0"></div>
	<div class="col l6 s10 m10 ">

		<div class = " card-panel white" style ="padding-left: 100px;padding-right:100px;margin-top: 70px;">
			<h4 class="center-align blue-text" style="margin-bottom:12%;" > Create New Admin</h4>
		<form action="create_user.php" autocomplete="off" method="POST">

      <div class="input-field" >
        <input  type="text" maxlength="30" name="username" value="" required>
        <label for="username">Username</label>

      </div>
      <br>
     
     <div class="input-field">
        <input type="text" name="first_name" value="" required>
        <label for="first_name">First Name</label>
      </div>
      <br>

      <div class="input-field">
        <input type="text" name="last_name" value="" required>
        <label for="first_name">Last Name</label>
      </div>

     
   
      <div class="row">
       <div class="input-field">
        <button type="submit" name="submit" class="btn-large center waves-effect waves-light indigo col l12 s12 m12" style="margin-bottom:10%;margin-top:25%;">ADD ADMIN</button>
      </div>
    </div>

   
 
    </form>
    </div>
	</div>
</div>
  

</main>






<?php include_layout_template('admin_footer.php');?>

