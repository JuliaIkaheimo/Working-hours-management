<?php
include "header_admin.html";
?>
<div class="container">
<div class="row">
<div class="col-12">

<?php
$yhteys = mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
 if (!$yhteys){
 	die("Yhteyttä ei voitu muodostaa ".mysql_error());
 }
$tietokanta = mysqli_select_db($yhteys, "trtkp19a3");
if (!$tietokanta) {
	die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
}
$sql = "select * from aaryhma4_projekti";
$tulos = mysqli_query($yhteys, $sql);
print "Valitse Projekti:";
print "<form>";
print "<select id='projekti' name='projekti' onchange='tulostaTunnit(this.value)'>";
while ($rivi=mysqli_fetch_object($tulos)){
	print "<option value=".$rivi->nimi.">".$rivi->nimi."</option>";
}
print "</select>";
print "</form>";
mysqli_close($yhteys);
?>

<div id='tulos'>Valitse projekti ja näet tuotunnit</div>

</div>
</div>
</div>

<script>
function tulostaTunnit(str) {
    if (str == "") {
        document.getElementById("tulos").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tulos").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","luehenkilontunnit.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<?php
include "footer.html";
?>