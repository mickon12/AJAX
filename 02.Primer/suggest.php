<?php
if (!isset ($_GET["unos"])){
echo "Parametar Unos nije prosleđen!";
} else {
$pomocna=$_GET["unos"];
include "konekcija.php";
$sql="SELECT id,drzava FROM Drzava WHERE drzava LIKE '$pomocna%'ORDER BY drzava";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows==0){
echo "U bazi ne postoji država koja počinje na " . $pomocna;
} else {
while($red = $rezultat->fetch_object()){
?>
<a href="#" onclick="place(this)"><?php  echo $red->drzava;?></a>
<br/>
<?php
}
}
$mysqli->close();
}
?>
