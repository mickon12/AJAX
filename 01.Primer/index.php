<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Izbor države</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
$("#kombo_drzave").change(function(){
var vrednost = $("#kombo_drzave").val();
$.get("prikazidrzavu.php", { id: vrednost },
   function(data){
     $("#popuni").html(data);
   });
});
});
</script>
</head>
<body>
<?php
include "konekcija.php";
$sql="SELECT * FROM Drzava";
$rezultat = $mysqli->query($sql);
?>
<form> 
<b>Izaberi državu:</b>
<select name="drzave" id="kombo_drzave">
<?php
while($red = $rezultat->fetch_object()){
?>
<option value="<?php echo $red->id;?>"><?php echo $red->drzava;?></option>
<?php
}
?>
</select>
</form>
<p><div id="popuni"><b>Podaci o selektovanoj državi će biti prikazani ovde. Stranica se ne učitava ponovo.</b></div></p>
<?php
$mysqli->close();
?>
</body>
</html>

