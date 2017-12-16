<?php 
if (isset($_POST['turndownforwhat']) && $_POST['turndownforwhat'] == true) {
	`shutdown -h now`;
	header('Location: http://khand.ml/d.php');
} else {
	echo '<form action="d.php" method="POST"><input type="number" name="sec" value="60"><br /><input type="hidden" name="turndownforwhat" value="true"><input type="submit" value="Turn down for what!"></form>';
}
?>
