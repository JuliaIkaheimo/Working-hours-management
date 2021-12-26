<?php
include "header.html";
?>
<?php



session_start();

$message="";
if(count($_POST)>0) {
    $conn = mysqli_connect("127.0.0.1","trtkp19a3","trtkp19a3","trtkp19a3");
    $result = mysqli_query($conn,"SELECT * FROM aaryhma4_henkilot WHERE tunnus='" . $_POST["tunnus"] . "' and salasana = '". MD5($_POST["salasana"])."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
		$message="mess:".$row['henkilo_id'];
		$_SESSION["id"] = $row['henkilo_id'];
        $_SESSION["tunnus"] = $row['tunnus'];
        $_SESSION["nimi"] = $row['nimi'];
	} 
	else {
		$message = "Väärä käyttäjätunnus tai salasana";
	}
}
if(isset($_SESSION["id"])) {
if( $_SESSION["tunnus"]== "admin"){
	header("Location:admin.php");
	
}
else {
	header("Location:kayttaja.php");	
}
return;
}
?>


<div class="container">
<div class="row">
<div class="col-3">

<form name="frmUser" method="post" action="index.php">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
            <tr class="tableheader">
            <td align="center" colspan="2">Kirjoita käyttäjätiedot</td>
            </tr>
            <tr class="tablerow">
            <td>
            <input type="text" name="tunnus" placeholder="Käyttäjätunnus" class="login-input"></td>
            </tr>
            <tr class="tablerow">
            <td>
            <input type="password" name="salasana" placeholder="Salasana" class="login-input"></td>
            </tr>
            <tr class="tableheader">
            <td align="center" colspan="2"><input type="submit" name="submit" value="Kirjaudu" class="btnSubmit"></td>
            </tr>
        </table>
</form>
</div>
</div>
</div>



<?php
include "footer.html";
?>