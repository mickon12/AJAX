<?php 
$mysql_server = "127.0.0.1:3307";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "svet";
$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");

?>