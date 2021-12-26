<?php
$tunnus=$_POST["tunnus"];
$salasana=$_POST["salasana"];
$etunimi=$_POST["etunimi"];
$sukunimi=$_POST["sukunimi"];
$sahkoposti=$_POST["sahkoposti"];

$suojattuss = md5($salasana);

//Yhteyden tarkistus
$yhteys = mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
 if (!$yhteys){
 	die("Yhteyttä ei voitu muodostaa ".mysql_error());
 }
echo "Yhteys OK."; // debuggia
$tietokanta = mysqli_select_db($yhteys, "trtkp19a3");
if (!$tietokanta) {
	die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
}
echo "Tietokanta OK."; // debuggia
$sql = "insert into aaryhma4_henkilot(tunnus, salasana, etunimi, sukunimi, sahkoposti) values(?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sssss', $tunnus, $suojattuss, $etunimi, $sukunimi, $sahkoposti); 
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location:admin.php");
exit;
?>