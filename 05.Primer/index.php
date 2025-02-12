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
                $.get("obrisi.php", { id: vrednost }, function (data) {
                    if (data.trim() === "1") { 
                        location.reload(); // Osvežavanje stranice nakon uspešnog brisanja
                    } else {
                        alert("Greška prilikom brisanja!");
                    }
                });
            });

            $("#search").on("keyup", function () {
                var vrednost = $(this).val().toLowerCase();
                $("#ta tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(vrednost) > -1);
                });
            });
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .obrisi_link {
            color: red;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .obrisi_link:hover {
            text-decoration: underline;
        }
        .btn-dodaj {
            display: inline-block;
            margin: 20px auto;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-dodaj:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<input type="text" id="search" placeholder="Pretraži države...">
    <?php 
        include("konekcija.php");
        $sql = "SELECT id, drzava, narod, glgrad, brstanovnika, kontinent FROM drzava";
        
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
    <a href="../04.Primer/index.php">
    <button style="margin-top: 10px; padding: 10px 20px; font-size: 16px; cursor: pointer;">
        Dodaj novu državu
    </button>
</a>
</body>
</html>
