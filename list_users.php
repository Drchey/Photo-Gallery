<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {
	redirect_to("login.php");
}

?>
<?php 
$user = User::find_all();
?>


<?php include_layout_template('admin_header.php');?>
<?php include_layout_template('sidenavs.php');?>

<main style="margin-top: 0%; margin-left: 25%;">

<div class="row">
<div class="row col l11 s10 m10">
 <table class="card striped white">
        <thead class="grey darken-3 white-text" style="font-family: sans-serif;padding: 100px;">
          <tr>
              <th></th>
              <th>Username</th>
              <th>Fullname</th> 
              <th>Action</th>

             
          </tr>
        </thead>

   
        	<?php foreach ($user as $user): ?>
        <tbody>
       <tr>
    <td><img src="../images/ava.png" width="50" height="50"/></td>
    <td><?php echo $user->username;?></td>
    <td><?php echo $user->full_name();?></td>
    <td>
      <a href="edit_user.php?id=<?php echo $user->id; ?>"><i class="material-icons green-text">edit</i></a>
      &nbsp;
      &nbsp;
      <a href="delete_user.php?id=<?php echo $user->id; ?>"><i class="material-icons red-text">delete</i></a>
      
    
  </td> 
  	</tr>
  <?php endforeach; ?>

        	
    	</tbody>
    </table></div>
</div>

	
</main>


<?php include_layout_template('admin_footer.php');?>

