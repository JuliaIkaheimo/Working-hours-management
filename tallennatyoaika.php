<?php
session_start();
$kirjautunut=$_SESSION["tunnus"];

$projekti=$_POST['projekti'];
$tehtava=$_POST['tehtava'];
$tehdyt_tunnit=$_POST['tehdyt_tunnit'];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");


$tulos=mysqli_query($yhteys, "select henkilo_id from aaryhma4_henkilot where tunnus='".$kirjautunut."';");
$rivi=mysqli_fetch_object($tulos);



$sql="insert into aaryhma4_tyoaika(projekti, tehtava, tehdyt_tunnit, henkilo_id) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssdi', $projekti, $tehtava, $tehdyt_tunnit, $rivi->henkilo_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location:paivitatyoaika.php");
exit;
?>