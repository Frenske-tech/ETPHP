<?php
//Include de database verbinding file
include("../../includes/config2.php");
 
//Haalt id op van de data van de URL
$ReserveringID = isset($_GET['id']) ? $_GET['id'] : '';

 
//delete de aangeklikte row van de tabel
$sql = "DELETE FROM reservering WHERE ReserveringID=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id'=> $ReserveringID));
 

header("Location:../../clsReserveringen.php");
?>
