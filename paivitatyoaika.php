<?php
include 'header_kayttaja.html';
?>
<div class="container">
<div class = "row">
 <div class="col-4">
<h2>Päivitä työaikasi</h2>
<form action='tallennatyoaika.php' method='post'>
Projekti:
<div> 
<?php


$yhteys = mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$tietokanta = mysqli_select_db($yhteys, "trtkp19a3");

$sql = "select * from aaryhma4_projekti";
$tulos = mysqli_query($yhteys, $sql);
print "<select id='projekti' name='projekti'>"; //onchange='teejotain();'
while ($rivi=mysqli_fetch_object($tulos)){
    print "<option value=".$rivi->nimi.">".$rivi->nimi."</option>";
}
print "</select>";


?>
</div>
<div>
Työtehtävä: <br><input type='text' name='tehtava' value=' ' ><br> </div>
Työtunnit: <br><input type='text' name='tehdyt_tunnit' value=' ' ><br>
<br>
<input class='button' type='submit' name='ok' value='Tallenna tiedot'><br>
</form>
</div>
<div class="col-8">
<?php

session_start();
$kirjautunut=$_SESSION["tunnus"];
$tulos=mysqli_query($yhteys, "select * from aaryhma4_tyoaika join aaryhma4_henkilot using(henkilo_id) where tunnus='".$kirjautunut."';");

 

print "<table id='t01'><tr><th>Projekti</th><th>Työtehtävä</th><th>Työtunnit</th></tr>";
 while ($rivi=mysqli_fetch_object($tulos)){
     print "<tr><td>$rivi->projekti </td><td> $rivi->tehtava </td><td> $rivi->tehdyt_tunnit </td>";
 }
print "</table>";
mysqli_close($yhteys);

?>
</div>


<?php
include 'footer.html';
?>


