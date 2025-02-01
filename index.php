<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Izbor države</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#kombo_drzave").change(function () {
                var vrednost = $(this).val();
                
                $.get("prikazidrzavu.php", { id: vrednost })
                    .done(function (data) {
                        $("#popuni").html(data);
                    })
                    .fail(function () {
                        $("#popuni").html("<b>Greška pri učitavanju podataka.</b>");
                    });
            });
        });
    </script>
</head>
<body>
    <?php
    include "konekcija.php";
    
    if ($mysqli->connect_error) {
        die("Greška pri povezivanju: " . $mysqli->connect_error);
    }
    
    $sql = "SELECT * FROM Drzava";
    $rezultat = $mysqli->query($sql);
    ?>
    
    <form> 
        <b>Izaberi državu:</b>
        <select name="drzave" id="kombo_drzave">
            <option value="" disabled selected>-- Izaberite državu --</option>
            <?php
            if ($rezultat->num_rows > 0) {
                while ($red = $rezultat->fetch_object()) {
                    echo "<option value='{$red->id}'>{$red->drzava}</option>";
                }
            } else {
                echo "<option value=''>Nema dostupnih država</option>";
            }
            ?>
        </select>
    </form>
    
    <p>
    <div id="popuni"><b>Podaci o selektovanoj državi će biti prikazani ovde. Stranica se ne učitava ponovo.</b></div>
    </p>
    
    <?php
    $mysqli->close();
    ?>
</body>
</html>
