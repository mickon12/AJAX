<?php 
// 1. Povezivanje sa bazom podataka
include("konekcija.php");
$conn = $mysqli;

// Provera konekcije
if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}

// 2. Provera AJAX-om da li država postoji
if (isset($_GET['drzava'])) {
    $drzava = $conn->real_escape_string($_GET['drzava']);

    $sql = "SELECT * FROM drzava WHERE drzava = '$drzava'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "0"; // Država već postoji
    } else {
        echo "1"; // Država ne postoji, može se dodati
    }
}

// 3. Dodavanje države kroz formu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drzava = $conn->real_escape_string($_POST['naziv']);
    $narod = $conn->real_escape_string($_POST['narod']);
    $glgrad = $conn->real_escape_string($_POST['glgrad']);
    $brstanovnika = intval($_POST['brst']);
    $kontinent = $conn->real_escape_string($_POST['kont']);

    // Provera da li država postoji
    $sql_provera = "SELECT * FROM drzava WHERE drzava = '$drzava'";
    $result_provera = $conn->query($sql_provera);

    if ($result_provera->num_rows > 0) {
        echo "Država već postoji u bazi.";
    } else {
        // Ubacivanje podataka (brglasova je podrazumevano 0)
        $sql_insert = "INSERT INTO drzava (drzava, narod, glgrad, brstanovnika, kontinent, brglasova) 
                       VALUES ('$drzava', '$narod', '$glgrad', $brstanovnika, '$kontinent', 0)";

        if ($conn->query($sql_insert) === TRUE) {
            header("Location: ../01.Primer/index.php");
            exit();
        } else {
            echo "Greška: " . $conn->error;
        }
    }
}

// 4. Zatvaranje konekcije
$conn->close();
?>