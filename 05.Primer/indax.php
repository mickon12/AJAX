<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Države</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".obrisi_link").click(function (e) {
                e.preventDefault(); // Sprečava reload stranice
                
                var vrednost = $(this).attr("id").substring(7); // Uzimanje ID-a iz "obrisi_123"
                var red_tabele = $(this).closest("tr"); // Pronalazi najbliži <tr>

                $.get("obrisi.php", {id: vrednost}, function (data) {
                    if (data.trim() === "1") { // Proveravamo da li je odgovor tačno "1"
                        red_tabele.parent().parent().remove(); // Brišemo red
                    } else {
                        alert("Greška prilikom brisanja!");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <?php 
        include("konekcija.php");
        $sql = "SELECT id, drzava, narod, glgrad, brstanovnika, kontinent, brglasova FROM drzava";
        
        $q = $mysqli->query($sql);
        if (!$q) {
            die("Nastala je greška tokom upita: <b>" . $mysqli->error . "</b>");
        }
        
        if ($q->num_rows == 0) {
            echo "<p>Nema država u bazi.</p>";
        } else {
    ?>
            <table id="ta" width="600" border="1" cellpadding="5" cellspacing="2" style="text-align:center;">
                <tr>
                    <th>Država</th>
                    <th>Narod</th>
                    <th>Glavni grad</th>
                    <th>Broj stanovnika</th>
                    <th>Kontinent</th>
                    <th>Akcija</th>
                </tr>
                <?php while ($red = $q->fetch_object()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($red->drzava); ?></td>
                        <td><?php echo htmlspecialchars($red->narod); ?></td>
                        <td><?php echo htmlspecialchars($red->glgrad); ?></td>
                        <td><?php echo number_format($red->brstanovnika, 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($red->kontinent); ?></td>
                        <td><a href="#" class="obrisi_link" id="obrisi_<?php echo $red->id; ?>">Obriši</a></td>
                    </tr>
                <?php } ?>
            </table>
    <?php 
        }
        $mysqli->close();
    ?>
</body>
</html>
