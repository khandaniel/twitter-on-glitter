<form>
	<input type="text" name="f"> *
	<input type="text" name="s">
	<input type="submit" name="">
</form>
<?php 
error_reporting(0);
if (isset($_GET['f']) && isset($_GET['s'])) {
	echo $_GET['f'] * $_GET['s'];
} else {
	echo "";
}
?>

