<?php


if (isset($_POST["id"])){
	$id=$_POST["id"];
}

if (isset($_POST["nimi"])){
	$nimi=$_POST["nimi"];
}

if (isset($_POST["kuvaus"])){
	$kuvaus=$_POST["kuvaus"];
}



if (!(isset($nimi) || isset($kuvaus) || isset($id))) {
	header("Location: projekti.php");
	exit;
}


$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");


$sql="update aaryhma4_projekti set nimi=?, kuvaus=? where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssi', $nimi, $kuvaus,  $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location: projekti.php");
exit;


?>
