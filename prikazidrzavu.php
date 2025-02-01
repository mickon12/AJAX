<?php
include "konekcija.php";

if (!isset($_GET["id"])) {
    echo "<b>Parametar ID nije prosleđen!</b>";
    exit;
}

$pomocna = $mysqli->real_escape_string($_GET["id"]);

$sql = "SELECT * FROM drzava WHERE id='$pomocna'";
$rezultat = $mysqli->query($sql);

if ($rezultat->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>Država</th>
    <th>Većinski narod</th>
    <th>Broj stanovnika</th>
    <th>Glavni grad</th>
    <th>Kontinent</th>
    </tr>";

    while ($red = $rezultat->fetch_object()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($red->drzava) . "</td>";
        echo "<td>" . htmlspecialchars($red->narod) . "</td>";
        echo "<td>" . htmlspecialchars($red->brstanovnika) . "</td>";
        echo "<td>" . htmlspecialchars($red->glgrad) . "</td>";
        echo "<td>" . htmlspecialchars($red->kontinent) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<b>Nema podataka za izabranu državu.</b>";
}

$mysqli->close();
?>

