<?php 
require_once("../includes/initialize.php");  ?>

<?php include_layout_template('header.php');?>
<?php if (empty($_GET['id'])){
	redirect_to("index.php");
} 
$photos = Photograph::find_by_id($_GET['id']);

if (!$photos) {
	echo"<script>alert('Photo was not located')";
	redirect_to("index.php");	
}

?>
<?php 
if(isset($_POST['submit'])) {
	  $author = mysql_real_escape_string($_POST['author']);
	  $body = mysql_real_escape_string($_POST['body']);
	
	  $new_comment = Comment::make($photos->id, $author, $body);
	  if($new_comment && $new_comment->save()) {
			
	    redirect_to("photos.php?id={$photos->id}"); 
	
		} else { 
		
	   echo "<script>alert(There was an error that prevented the comment from being saved.'')</script>";
		}
	} else {
		$author = "";
		$body = "";
	}
	$comments = Comment::find_comments_on($photos->id); 
?>
<!-- image -->
<div class="row" style="margin: 2%;">
	<h2 class="grey-text"><?php echo $photos->caption;?></h2>

	<img src="<?php echo $photos->image_path();?>" width="600" alt="Photo Gallery"class="materialboxed" height="500"/>
	
	<figcaption class="grey-text"><?php echo $photos->caption;?></figcaption>
 
</div>


<!-- list comment -->

<div class="container" style="margin-top: 5%;margin-bottom: 1px;">
	<div class="col l0 m1 s1"></div>
	
	<h4 class="teal-text"><strong>Comments</strong></h4>
<?php foreach ($comments as $comment):?> 

  <div class="author"><strong style="font-size: 20px;">
    <?php echo htmlentities($comment->author); ?>
    </strong> wrote:</div>
    <div class="body" >
      <?php echo strip_tags($comment->body, '<strong><em><p>');?>
    </div>
    <div class="meta-info" style="font-size: :0.8em;margin-bottom: 2%;">
      <?php echo datetime_to_text($comment->created); ?>
</div>



<?php endforeach; ?>
<?php if(empty($comments)){
  echo "NO Comments";
}

?>
</div>

<!-- comment form -->


<div class="row" style="margin-top: 9%;">
<div class="col l2 s1 m1"></div>
<div class="col l6 s10 m10">

 <h4 class="teal-text">New Comment</h4>
<form action="photos.php?id=<?php echo $photos->id;?>" autocomplete="off" method="POST">

      <div class="input-field">
        <input type="text" maxlength="30" name="author" value="<?php echo $author; ?>">
        <label for="author">Username</label>
      </div>
      <br>
     
      <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"  name="body" value="<?php echo $body; ?>"></textarea>
          <label for="textarea1">Textarea</label>
        </div>

   
      <div class="row">
       <div class="input-field">
        <button type="submit" name="submit" class="btn center waves-effect waves-light teal col l2 s12 m12 right-align" style="margin-left: 77%;margin-top: 5%;">Save</button>
      </div>
    </div>

   
 
    </form>
</div>
</div>
</div>







<?php include_layout_template('footer.php');?>