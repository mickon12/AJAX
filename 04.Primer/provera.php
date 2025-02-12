<?php 
include "konekcija.php";
if(!isset($_GET["naziv"])){
    echo"Parametar naziv nije prosleđen";
} else {
    $naziv = $_GET["naziv"];
    
    $sql = "SELECT * FROM Drzava WHERE drzava = '".$naziv. "'";
    $rezultat = $mysqli-> query($sql);
    if($rezultat->num_rows != 0){
        echo "0"; 
    } else{
        echo "1";
    } 
    $mysqli->close();
}
?>