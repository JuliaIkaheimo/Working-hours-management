<?php
include "header_kayttaja.html";
?>
<div class="container">
<div class="row">
 <div class="col-4">
<h2>Työajan seuranta</h2>
<p> Täältä näe työajat projekteissa joissa olet mukana.</p>
</div>
 <div class="col-8">
<?php

session_start();
$kirjautunut=$_SESSION["tunnus"];
$yhteys = mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$tietokanta = mysqli_select_db($yhteys, "trtkp19a3");

$tulos=mysqli_query($yhteys, "select projekti, SUM(tehdyt_tunnit) as tehdyt_tunnit from aaryhma4_tyoaika join aaryhma4_henkilot using(henkilo_id) where tunnus='".$kirjautunut."' GROUP BY projekti;");

 

print "<table id='t01'><tr><th>Projekti</th><th>Työtunnit</th><th>Työntekijän tunnus</th></tr>";
 while ($rivi=mysqli_fetch_object($tulos)){
     print "<tr><td>$rivi->projekti </td><td> $rivi->tehdyt_tunnit tuntia</td><td>$kirjautunut</td>";
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