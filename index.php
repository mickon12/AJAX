<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <script type="text/javascript" src="pronadji.js"></script>
</head>
<body>
    <?php 
         include "konekcija.php";
         $sql = "SELECT * FROM drzava";
         $rezultat = $mysqli->query($sql);

    ?>
    <form>
        <b>Izaberi državu: </b>
        <select name="drzava" onchange="PrikaziZemlju(this.value)">
            <?php 
            while ($row = $rezultat->fetch_object()) {
                ?>
                <option value="<?php echo $row->id;?>"><?php echo $row->dezava;?></option>
                <?php
            }
            ?>
            </select>
        </form>
            <p><div id="popuni"><b>Podaci o selektovanoj državi će biti prikazani ovde. Stranica se ne 
                učitava ponovo.</b></div>
            </p>
            <?php 
            $mysqli->close();
            ?>
</body>
</html>