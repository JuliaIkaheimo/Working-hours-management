<?php
include "header_kayttaja.html";
?>
<div class="container">
<div class="row">

<div class="col-4">


<?php

session_start();
$kirjautunut=$_SESSION["tunnus"];

if	(isset($_GET["poistettava"])){
	$poistettava=$_GET["poistettava"];
}

//Yhteyden tarkistus
$yhteys = mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
 if (!$yhteys){
 	die("Yhteyttä ei voitu muodostaa ".mysql_error());
 }

$tietokanta = mysqli_select_db($yhteys, "trtkp19a3");
if (!$tietokanta) {
	die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
}


if	(isset($poistettava)){
	$sql = "delete from aaryhma4_henkilot where henkilo_id=?";
	$stmt = mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $poistettava); 
	mysqli_stmt_execute($stmt);
}




$tulos=mysqli_query($yhteys, "select * from aaryhma4_henkilot where tunnus = '".$kirjautunut."';");


print "<br><br><h2> Kirjautuneena sisään </h2><br>";
while ($rivi=mysqli_fetch_object($tulos)){
 	print "<ul class='list-group'>
	  <li class='list-group-item'>Tunnus: $rivi->tunnus</li>
  <li class='list-group-item'>Etunimi: $rivi->etunimi</li>
  <li class='list-group-item'>Sukunimi: $rivi->sukunimi</li>
  <li class='list-group-item'>Sähköposti: $rivi->sahkoposti</li>
</ul>";
print "<br><a class='button' href='kmuokkaus.php?muokattava=".$rivi->henkilo_id."'>Muokkaa tietojasi</a>";
}



mysqli_close($yhteys);
?>
</div>
</div>
</div>

<?php
include "footer.html";
?>