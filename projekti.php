<?php
include "header_admin.html";
?>
<div class="container">
<div class="row">
  <div class="col-4">
<h2>Lisää uusi projekti</h2>
<form action='ptallenna.php' method='post'>
Nimi: <br> <input type='text' name='nimi' value=''><br>
Kuvaus: <br> <input type='text' name='kuvaus' value=''><br>

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
	$sql = "delete from aaryhma4_projekti where id=?";
	$stmt = mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $poistettava); 
	mysqli_stmt_execute($stmt);
}

$tulos=mysqli_query($yhteys, "select * from aaryhma4_projekti");

print "<table id='t01'><tr><th>Projekti ID</th><th>Nimi</th><th>Kuvaus</th><th>Poista</th><th>Muokkaa</th></tr>";
 while ($rivi=mysqli_fetch_object($tulos)){
 	print "<tr><td>$rivi->id </td> <td> $rivi->nimi </td> <td> $rivi->kuvaus </td>
	<td><a class='button buttonintable' href='projekti.php?poistettava=".$rivi->id."'>Poista</a></td>
	<td><a class='button buttonintable' href='pmuokkaus.php?muokattava=".$rivi->id."'>Muokkaa</a></td> </tr>";
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