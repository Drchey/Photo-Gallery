<?php 
require_once("../../includes/initialize.php");

if($session->is_logged_in()) {
  redirect_to("index.php");
}

if (isset($_POST['submit'])) { 

  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);


	$found_user = User::authenticate($username, $password);
	
  if ($found_user) {
    $session->login($found_user);
    log_action('Login', "{$found_user->username} logged in");
    redirect_to("index.php");
  } else {
    
    echo "<script>alert('Username/password combination incorrect')</script>";
  }
  
} else {
  $username = "";
  $password = "";
}

?>
<?php include_layout_template('admin_header.php');?>

<div class="row white-text">

      <div class="col l4 s4 m3"></div>
      <div class="col l4">
       
<div class = " card-panel white" style ="padding-left: 100px;padding-right:100px;margin-top: 70px;"> 

    <h4 class=" black-text center "><strong>LOGIN</strong></h4>
    <br><br>
    <form action="login.php" autocomplete="off" method="POST">

      <div class="input-field">
        <input  type="text" maxlength="30" name="username" value="<?php echo htmlentities($username); ?>" >
        <label for="username">Username</label>

      </div>
      <br>
     
      <div class="input-field">
        <input type="password" name="password" value="<?php echo htmlentities($password); ?>" >
        <label for="password">Password</label>
      </div>

   
      <div class="row">
       <div class="input-field">
        <button type="submit" name="submit" class="btn-large center waves-effect waves-light black col l12 s12 m12" style="margin-bottom:10%;margin-top:35%;">LOG-IN</button>
      </div>
    </div>

   
 
    </form>
  </div>    
      </div>
      </div>


</body>

<?php include_layout_template('admin_footer.php');?>

