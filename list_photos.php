<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {
	redirect_to("login.php");
}

?>
<?php 
$photo = Photograph::find_all();
?>


<?php include_layout_template('admin_header.php');?>
<?php include_layout_template('sidenavs.php');?>

<main style="margin-top: 0%; margin-left: 25%;">

<div class="row">
<div class="row col l11 s10 m10">
 <table class="card striped ">
        <thead class="grey darken-3 white-text" style="font-family: sans-serif;padding: 100px;">
          <tr>
              <th>Image</th>
              <th>Filename</th> 
              <th>Caption</th>
              <th>Type</th > 
              <th>Comments</th> 
              <th>Actions</th>    
          </tr>
        </thead>

   
        	<?php foreach ($photo as $photo): ?>
        <tbody>
       <tr>
   <td><img src="../<?php echo $photo->image_path();?>" width="50" height="50"/></td>
    <td><?php echo $photo->filename;?></td>
    <td><?php echo $photo->caption;?></td>
    <td><?php echo $photo->type;?></td>
    <td>
    <a href="view_comments.php?id=<?php echo $photo->id;?>" class="teal-text">&nbsp;&nbsp;
    	<?php echo count($photo->comments());?>
    </a></td>
  	<td><a href="delete_photo.php?id=<?php echo $photo->id; ?>">&nbsp;&nbsp;<i class="material-icons red-text">delete</i></a></td>  
  	</tr>
  <?php endforeach; ?>

        	
    	</tbody>
    </table></div>
</div>

	
</main>


<?php include_layout_template('admin_footer.php');?>

