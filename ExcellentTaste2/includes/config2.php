<?php
 
$databaseHost = 'localhost';
$databaseName = 'etaste';
$databaseUsername = 'root';
$databasePassword = '';
 
try {
    //Probeert de Database verbinding vast te leggen
    $dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
    
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Zet Error Mode als Exception/Uitzondering
    
} catch(PDOException $e) {
    echo $e->getMessage();
}
 
?>