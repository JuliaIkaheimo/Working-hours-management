<?php
$nimi=$_POST["nimi"];
$kuvaus=$_POST["kuvaus"];


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
$sql = "insert into aaryhma4_projekti(nimi, kuvaus) values(?, ?)";
$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ss', $nimi, $kuvaus); 
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location:projekti.php");
exit;
?>