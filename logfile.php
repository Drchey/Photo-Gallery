<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {
	redirect_to("login.php");
}

?>
<?php
$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
if(isset($_GET['clear'])){
	if ($_GET['clear'] == 'true') {
		file_put_contents($logfile, '');
		log_action('Logs Cleared', "by USER ID
		{$session->user_id}");
		redirect_to("logfile.php");
	}
}


?>


<?php include_layout_template('admin_header.php');?>
<?php include_layout_template('sidenavs.php');?>

<main  style="margin-top: 0%; margin-left: 25%;" >
	

<h4 class="white-text">Log File</h4>



<?php

  if( file_exists($logfile) && is_readable($logfile) && 
			$handle = fopen($logfile, 'r')) {  // read
    echo "<ul class=\"log-entries\">";
		while(!feof($handle)) {
			$entry = fgets($handle);
			if(trim($entry) != "") {
				echo "<li>{$entry}</li>";
			}
		}
		echo "</ul>";
    fclose($handle);
  } else {
    echo "Could not read from {$logfile}.";
  }

?>

<div class="row" style="margin-top: 30%;margin-left: 70%;">
	<a href="logfile.php?clear=true" class="btn">Clear log file</a>
</div>

</main>
<?php include_layout_template('admin_footer.php'); ?>


