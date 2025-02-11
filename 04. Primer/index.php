<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           $("#ime").blur(function(){
            var vrednost = $("#ime").val();
            $.get("provera.phph", { naziv: vrednost},
               function() {
                if(data == 0){
                    $("#user").html("Država sa takvim imenom već postoji u  bazi");
                    $("ime").focus();
                }
                if(data == 1){
                    $("#user").html("Ime države je dostupno")č
                }
               });
           }); 
        });
    </script>
</head>
<body>
    <form>
        <h1>Ova forma služi kao primer korišćenja AJAX-a u validaciji forme</h1>
        <br>
        <h2>Podaci o državi</h2>
        <br>
        <b>Naziv države</b> 
        <input type="text" name="naziv" id="ime"><div id="user">Informacija o validnosti imena drzave</div>
        <br>
        <b>Narod</b> 
        <input type="text" name="narod" id="">
        <br>
        <br>
        <b>Glavni grad</b> 
        <input type="text" name="glgrad">
        <br>
        <br>
        <b>Broj stanovnika</b> 
        <input type="text" name="brst">
        <br>
        <br>
        <br>
        <b>Izaberite kontinent:</b>
        <input type="radio" name="kont" value="eu"> Evropa
        <input type="radio" name="kont" value="af"> Afrika
        <input type="radio" name="kont" value="az"> Azija
        <br>
        <br>
        <input type="submit" value="Registruj" name="submit"> 
        <input type="reset" value="Obrisi podatke" namer="reset">
    </form>
</body>
</html>
