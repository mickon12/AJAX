<?php
if (!isset ($_GET["naziv"])){
echo "Parametar Naziv nije prosleđen!";
} else {
$pomocna=$_GET["naziv"];
include "konekcija.php";

$sql="SELECT * FROM Drzava WHERE drzava='".$pomocna."'";
$rezultat = $mysqli->query($sql);

echo "<table border='1'>
<tr>
<th>Vecinski narod</th>
<th>Broj stanovnika</th>
<th>Glavni grad</th>
<th>Kontinent</th>
</tr>";

while($red = $rezultat->fetch_object()){
 echo "<tr>";
 echo "<td>" . $red->narod . "</td>";
 echo "<td>" . $red->brstanovnika . "</td>";
 echo "<td>" . $red->glgrad . "</td>";
 echo "<td>" . $red->kontinent . "</td>";
 echo "</tr>";
 }
echo "</table>";

$mysqli->close();
}
?>
