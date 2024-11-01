<?php 
if (isset($_POST['val1'])){
	$val1 = isset($_POST['val1']);
	$val2 = isset($_POST['val2']);
	
	
	
	function sum($val1, $val2){
	$plus = $val1 + $val2;
	echo "The sum is " . $plus;
	return $plus;
	}
	
	$getTheSum = sum($val1, $val2);
	
	
	
}

?>

<form action = "methods.php" method="post">
		<input type="text" name="val1">
		<input type="text" name="val2">
		<input type="submit" name="plus">
		<?php "<script>alert($getTheSum)</script>"; ?>
</form>

