<?php
include "header_admin.html";
?>

<?php


if (isset($_GET["muokattava"])){
	$muokattava=$_GET["muokattava"];
}

if (!isset($muokattava)){
	header("Location:admin.php");
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

<div class="container">
<div class="row">
  <div class="col-4">

<h2>Muokkaa tietoja</h2><br>
<form action="paivita.php" method="POST">
Muokattavan Henkilö ID: <br> <input type="text" name="henkilo_id" size="35" value="<?php print $rivi->henkilo_id; ?>" readonly><br><br>
Muokattavan Tunnus: <br><input type="text" name="tunnus" size="35" value="<?php print $rivi->tunnus; ?>"><br><br>
<b>UUSI</b> Salasana: <br><input type="text" name="salasana" size="35" value=""><br><br>
Muokattavan Etunimi: <br><input type="text" name="etunimi" size="35" value="<?php print $rivi->etunimi; ?>"><br><br>
Muokattavan Sukunimi: <br><input type="text" name="sukunimi" size="35" value="<?php print $rivi->sukunimi; ?>"><br><br>
Muokattavan Sähköposti: <br><input type="text" name="sahkoposti" size="35" value="<?php print $rivi->sahkoposti; ?>"><br><br>

<input type="submit" name="ok" value= 'OK'><br>
</form>
</div></div></div>

<?php
}



?>

<?php
include "footer.html";
?>