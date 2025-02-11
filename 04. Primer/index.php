<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Validacija forme</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           $("#ime").blur(function(){
                var vrednost = $("#ime").val();
                $.get("provera.php", { naziv: vrednost }, function(data) {
                    if(data == "0"){
                        $("#user").html("Država sa takvim imenom već postoji u bazi").css("color", "red");
                        $("#ime").focus();
                    } else if(data == "1"){
                        $("#user").html("Ime države je dostupno").css("color", "green");
                    }
                });
           }); 
        });
    </script>
</head>
<body>
<form action="dodaj.php" method="POST">
    <h1>Dodavanje nove države</h1>
    <b>Naziv države</b> 
    <input type="text" name="naziv" id="ime" required>
    <div id="user">Informacija o validnosti imena države</div>
    <br>

    <b>Narod</b> 
    <input type="text" name="narod" required>
    <br><br>

    <b>Glavni grad</b> 
    <input type="text" name="glgrad" required>
    <br><br>

    <b>Broj stanovnika</b> 
    <input type="number" name="brst" required>
    <br><br>

    <b>Izaberite kontinent:</b>
    <input type="radio" name="kont" value="Evropa" required> Evropa
    <input type="radio" name="kont" value="Afrika" required> Afrika
    <input type="radio" name="kont" value="Azija" required> Azija
    <input type="radio" name="kont" value="Severna Amerika" required> Severna Amerika
    <input type="radio" name="kont" value="Južna Amerika" required> Južna Amerika
    <input type="radio" name="kont" value="Australija" required> Australija
    <br><br>

    <input type="submit" value="Dodaj državu">
    <input type="reset" value="Obriši podatke">
</form>
</body>
</html>