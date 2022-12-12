<?php
//Include de database verbinding file
include("../../includes/config2.php");
 
//Haalt id op van de data van de URL
$Menuitemcode = isset($_GET['id']) ? $_GET['id'] : '';

 
//delete de aangeklikte row van de tabel
$sql = "DELETE FROM menuitem WHERE Menuitemcode=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id'=> $Menuitemcode));
 

header("Location:../../clsGerechten.php");
?>
