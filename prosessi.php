<?php
$message="gfdgdf";
if(count($_POST)>0) {
	$conn = mysqli_connect("127.0.0.1","trtkp19a3","trtkp19a3","trtkp19a3");
	$result = mysqli_query($conn,"SELECT * FROM aaryhma4_henkilot WHERE tunnus='" . $_POST["tunnus"] . "' and salasana = '". $_POST["salasana"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
	}
}
?>
