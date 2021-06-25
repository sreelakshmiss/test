<?php
include 'dbconfig.php';
$link = mysqli_connect("localhost", "root", "", "shop");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php 
	 $name = $_POST['name'];
	 $quantity = $_POST['quantity'];
	 $unit = $_POST['unit'];
	 $tax = $_POST['tax'];
	 
	 $sql = "INSERT INTO user (full_name, quantity, tax,unit) VALUES ('$name', '$quantity', '$unit','$tax')";
	 if(mysqli_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}

	
?>
