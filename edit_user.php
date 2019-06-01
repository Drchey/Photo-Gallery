<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {
	redirect_to("login.php");
}
?>

<?php
if (intval($_GET['id']) == 0) {
      redirect_to("index.php");
    }

  $user = User::find_by_id($_GET['id']);

if (isset($_POST['submit'])) { 

  $user->username = mysql_real_escape_string($_POST['username']);
  $user->first_name = mysql_real_escape_string($_POST['first_name']);
 $user->last_name = mysql_real_escape_string($_POST['last_name']);
 $user->password = mysql_real_escape_string($_POST['last_name']);

  if ($user->update()) {
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
			<h4 class="center-align teal-text" style="margin-bottom:12%;" > Edit New Admin</h4>
		<form action="edit_user.php?id=<?php echo urlencode($_GET['id']);?>" autocomplete="off" method="POST">

      <div class="input-field" >
        <input  type="text" maxlength="30" name="username" value="<?php echo $user->username;?>" required>
        <label for="username">Username</label>

      </div>
      <br>
     
     <div class="input-field">
        <input type="text" name="first_name" value="<?php echo $user->first_name;?> " required>
        <label for="first_name">First Name</label>
      </div>
      <br>

      <div class="input-field">
        <input type="text" name="last_name" value="<?php echo $user->last_name;?>" required>
        <label for="last_name">Last Name</label>
      </div>

     
   
      <div class="row">
       <div class="input-field">
        <button type="submit" name="submit" class="btn-large center waves-effect waves-light teal col l12 s12 m12" style="margin-bottom:10%;margin-top:25%;">EDIT ADMIN</button>
      </div>
    </div>

   
 
    </form>
    </div>
	</div>
</div>
  

</main>






<?php include_layout_template('admin_footer.php');?>

