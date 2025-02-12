<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dodavanje države</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#ime").blur(function(){
                var vrednost = $("#ime").val().trim();
                if (vrednost === "") {
                    $("#user").html("Naziv države ne može biti prazan").css("color", "red");
                    return;
                }

                $.get("provera.php", { naziv: vrednost }, function(data) {
                    if (data.trim() == "0") {
                        $("#user").html("Država sa takvim imenom već postoji").css("color", "red");
                        $("#ime").focus();
                    } else {
                        $("#user").html("Ime države je dostupno").css("color", "green");
                    }
                });
            });

            $("form").submit(function() {
                var brStanovnika = $("input[name='brst']").val();
                if (brStanovnika <= 0) {
                    alert("Broj stanovnika mora biti pozitivan!");
                    return false;
                }
            });
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        form {
            background: white;
            padding: 20px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: left;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .btn-container {
            text-align: center;
            margin-top: 15px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        input[type="reset"] {
            background-color: #dc3545;
            color: white;
        }
        input[type="reset"]:hover {
            background-color: #c82333;
        }
        #user {
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="dodaj.php" method="POST">
        <h1>Dodavanje nove države</h1>

        <label><b>Naziv države</b></label> 
        <input type="text" name="naziv" id="ime" required>
        <div id="user">Unesite naziv države</div>

        <label><b>Narod</b></label> 
        <input type="text" name="narod" required>

        <label><b>Glavni grad</b></label> 
        <input type="text" name="glgrad" required>

        <label><b>Broj stanovnika</b></label> 
        <input type="number" name="brst" required>

        <label><b>Izaberite kontinent:</b></label><br>
        <input type="radio" name="kont" value="Evropa" required> Evropa
        <input type="radio" name="kont" value="Afrika" required> Afrika
        <input type="radio" name="kont" value="Azija" required> Azija
        <input type="radio" name="kont" value="Severna Amerika" required> Severna Amerika
        <input type="radio" name="kont" value="Južna Amerika" required> Južna Amerika
        <input type="radio" name="kont" value="Australija" required> Australija

        <div class="btn-container">
            <input type="submit" value="Dodaj državu">
            <input type="reset" value="Obriši podatke">
        </div>
    </form>
</body>
</html>
