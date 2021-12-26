<?php
include "header_admin.html";
?>
<div class="container">
<div class="row">
  <div class="col-4">
<h2>Lisää uusi käyttäjä</h2>
<p> Täytä kaikki kentät, tiedot päivittyvät palvelimelle </p>
<form action='tallenna.php' method='post'>
Tunnus: <br> <input type='text' name='tunnus' size="35" value=''><br>
Salasana: <br> <input type='text' name='salasana' size="35" value=''><br>
Etunimi: <br> <input type='text' name='etunimi' size="35" value=''><br>
Sukunimi: <br> <input type='text' name='sukunimi' size="35" value=''><br>
Sähköposti: <br> <input type='text' name='sahkoposti' size="35" value=''><br>
<br>
<input class='button' type='submit' name='ok' value='Tallenna tiedot'><br>
</form>
</div>
<div class="col-8">


<?php




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

$tulos=mysqli_query($yhteys, "select * from aaryhma4_henkilot");

print "<table id='t01'><tr><th>Henkilo ID</th><th>Tunnus</th><th>Etunimi</th><th>Sukunimi</th><th>Sähköposti</th><th>Poista<th>Muokkaa</th></tr>";
 while ($rivi=mysqli_fetch_object($tulos)){
 	print "<tr><td>$rivi->henkilo_id </td> <td> $rivi->tunnus </td> <td> $rivi->etunimi </td><td> $rivi->sukunimi </td><td>$rivi->sahkoposti </td>
	<td><a class='button buttonintable' href='admin.php?poistettava=".$rivi->henkilo_id."'>Poista</a></td>
	<td><a class='button buttonintable' href='muokkaus.php?muokattava=".$rivi->henkilo_id."'>Muokkaa</a></td> </tr>";
 }
print "</table>";
mysqli_close($yhteys);
?>
</div>
</div>
</div>
<?php
include "footer.html";
?>