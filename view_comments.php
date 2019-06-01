<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	$id =$_GET['id'];
	if(empty($_GET['id'])) {
	  echo "No photograph ID was provided.";
	  redirect_to('index.php');
	}
	
  $photos = Photograph::find_by_id($_GET['id']);
  if(!$photos) {
    echo"The photo could not be located.";
    redirect_to('index.php');
  }

	$comments = $photos->comments();
	
?>

<?php include_layout_template('admin_header.php');?>
<?php include_layout_template('sidenavs.php');?>


<main style="margin-top: 0%; margin-left: 25%;">

<div class="container" >
<div class="row card col l10 s10 m10" style="margin:2%;">

<h5 style="margin-left:2%;padding: 4%;">
Comments on :<span class="teal-text"><?php echo $photos->filename;?></span>
<p>
	<img src="../<?php echo $photos->image_path();?>" width="50" height="50"/>
</p>
</h5>
<div style="margin-left:2%;padding: 4%;">
<?php foreach ($comments as $comment):?> 

  <div class="author"><strong style="font-size: 20px;">
    <?php echo htmlentities($comment->author); ?>
    </strong> wrote:</div>
    <div class="body" >
      <?php echo strip_tags($comment->body, '<strong><em><p>');?>
    </div>
    <div class="meta-info" style="font-size: :0.8em;margin-bottom: 2%;">
      <?php echo datetime_to_text($comment->created); ?>
     <div class="right-align" style="margin-top: : 2%;">
     <a href="delete_comment.php?id=<?php echo $comment->id; ?>" class="btn">Delete</a>
     </div>


<?php endforeach; ?>
<?php if(empty($comments)){
  echo "NO Comments";
}

?>

</div>

  <div>
</div>

	
</main>


<?php include_layout_template('admin_footer.php');?>












