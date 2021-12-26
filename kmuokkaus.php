<?php
include "header_kayttaja.html";
?>

<div class="container">
<div class="row">
<div class="col-5">

<?php


if (isset($_GET["muokattava"])){
	$muokattava=$_GET["muokattava"];
}

if (!isset($muokattava)){
	header("Location:kayttaja.php");
	exit;
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");


$sql="select * from aaryhma4_henkilot where henkilo_id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $muokattava);
mysqli_stmt_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);


if ($rivi=mysqli_fetch_object ($tulos)){
?>




<form action="kpaivita.php" method="POST">
<p hidden>Henkilö ID: <br> <input type="text" name="henkilo_id" value="<?php print $rivi->henkilo_id; ?>" readonly></p><br><br>
<p hidden><input type="text" name="tunnus" size="35" value="<?php print $rivi->tunnus; ?>">
<h2>Tietojen muokkaus</h2><br>
<h5>Jätä salasanakenttä tyhjäksi josset halua vaihtaa sitä</h5><br>
<h5>Ota ylläpitäjään yhteyttä muiden tietojen vaihtamiseksi</h5><br>

Salasana: <br><input type="text" name="salasana" size="35" value=""><br><br>
Sähköposti: <br><input type="text" name="sahkoposti" size="35" value="<?php print $rivi->sahkoposti; ?>"><br><br>

<input type="submit" name="ok" value= 'Tallenna'><br>
</form>
</div></div></div>

<?php
}



?>

<?php
include "footer.html";
?>