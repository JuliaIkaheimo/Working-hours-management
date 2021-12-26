<?php
session_start();
if(!isset($_SESSION["id"])) {
	header("Location:index.php");
}
?>
<?php
$q=$_GET['q'];

$yhteys = mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$tietokanta = mysqli_select_db($yhteys, "trtkp19a3");

$sql = "select etunimi,sukunimi,sum(`tehdyt_tunnit`) as 'tunnit' from aaryhma4_tyoaika join aaryhma4_henkilot using(henkilo_id) where projekti= '".$q."' group by aaryhma4_tyoaika.henkilo_id;";
$tulos = mysqli_query($yhteys, $sql);
print "<h2>".$q."-projektin työtunnit:</h2>";
print "<table>
<tr>
<th>Työntekijä</th>
<th>Tehdyt työtunnit</th>

</tr>";
while ($rivi=mysqli_fetch_object($tulos)){
	print "<tr><td>".$rivi->etunimi." ".$rivi->sukunimi."</td><td> ".$rivi->tunnit." Tuntia</td></tr>";
}
print "</table>";

mysqli_close($yhteys);
?>
