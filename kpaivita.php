<?php


if (isset($_POST["henkilo_id"])){
	$henkilo_id=$_POST["henkilo_id"];
}

if (isset($_POST["tunnus"])){
	$tunnus=$_POST["tunnus"];
}

if (isset($_POST["salasana"])){
	$salasana=md5($_POST["salasana"]);
}

if (isset($_POST["sahkoposti"])){
	$sahkoposti=$_POST["sahkoposti"];
}


if (!(isset($tunnus) || isset($salasana) ||isset($sahkoposti) || isset($henkilo_id))) {
	header("Location:kayttaja.php");
	exit;
}

if ($salasana == "d41d8cd98f00b204e9800998ecf8427e"){
$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");


$sql="update aaryhma4_henkilot set tunnus=?, sahkoposti=?  where henkilo_id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssi',$tunnus, $sahkoposti,  $henkilo_id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location:kayttaja.php");
}

else{
	$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
	$ok=mysqli_select_db($yhteys, "trtkp19a3");
	
	
	$sql="update aaryhma4_henkilot set tunnus=?, salasana=?, sahkoposti=?  where henkilo_id=?";
	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'sssi',$tunnus, $salasana, $sahkoposti,  $henkilo_id);
	mysqli_stmt_execute($stmt);
	
	mysqli_stmt_close($stmt);
	mysqli_close($yhteys);
	
	header("Location:kayttaja.php");
	}

exit;


?>
