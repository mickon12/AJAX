<?php
if(!isset($_GET["glas"])){
    echo"Parametar glas nije prosleđen";
} else{ 
    $vote = $_GET["glas"];
    include"konekcija.php";
    $sql1 = "SELECT brglasova FROM Drzava WHERE id='".$vote."'"; 
    $upit1 = $mysqli->query($sql1);
    $rezultat1 = $upit1->fetch_object();
    $novi_rezultat = $rezultat1->brglasova + 1;
    $sql2 = "UPDATE drzava SET  brglasova=".$novi_rezultat." WHERE id='".$vote."'";
    $rezultat2 = $mysqli->query($sql2);
    $sql3 = "SELECT SUM( brglasova) as br FROM drzava";
    $ukupanbroj = $mysqli->query($sql3);
    $object = $ukupanbroj->fetch_object();
    $ukupan_broj_glasova = $object->br;
    $sql4 = "SELECT drzava, brglasova FROM drzava";
    $konacni = $mysqli->query($sql4);
    echo "<table>";
    while($row = $konacni->fetch_object()) {
        $drzava = $row->drzava;
        $brglasova = $row->brglasova;
        $procenat_glasova = 100*round($brglasova/$ukupan_broj_glasova,2);
        ?>
        <tr>
            <td><b><?php echo $drzava; ?></b></td>
            <td><img src="slika.gif" width="<?php echo($procenat_glasova); ?>" height="20">
            <b><?php echo($procenat_glasova); ?>%</b>  
        </tr>
        <?php
    }
    echo"</table>";
    $mysqli->close();
}
?>
