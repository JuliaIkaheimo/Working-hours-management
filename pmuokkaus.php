<?php
include "header_admin.html";
?>

<?php


if (isset($_GET["muokattava"])){
	$muokattava=$_GET["muokattava"];
}

if (!isset($muokattava)){
	header("Location:projekti.php");
	exit;
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");


$sql="select * from aaryhma4_projekti where id=?";
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
<form action="ppaivita.php" method="POST">
Muokattavan Projekti ID: <br> <input type="text" name="id" value="<?php print $rivi->id; ?>" readonly><br><br>
Muokattavan Nimi: <br><input type="text" name="nimi" value="<?php print $rivi->nimi; ?>"><br><br>
Muokattavan Kuvaus: <br><input type="text" name="kuvaus" value="<?php print $rivi->kuvaus; ?>"><br><br>


<input type="submit" name="ok" value= 'OK'><br>
</form>
</div></div></div>

<?php
}



?>

<?php
include "footer.html";
?>