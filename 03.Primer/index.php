<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script type="text/javascript" src="jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".radiodugme").change(function (){
                var vrednost = $("input[name = 'vote']:checked").val();
                $.get("upisglasanja.php", {glas : vrednost}, 
                function(data){
                    $("#poll").html(data);
                });
            });
        });
    </script>
</head>
<body>
    <?php 
    include("konekcija.php");
    $sql = "SELECT * FROM Drzava";
    $rezultat = $mysqli->query($sql);
    ?>
    <div id = "poll">
        <h2> Za koju temlju glassate?</h2> 
        <form>
            <?php 
            while($red = $rezultat->fetch_object()){
                ?>
                <?php echo $red->drzava;?>
                <input type="radio" name="vote" value="<?php  echo $red->id;?>" 
                class="radiodugme"><br><br>
                
            <?php
        }
        $mysqli->close();
        ?>
        </form>
    </div>
</body>
</html>
