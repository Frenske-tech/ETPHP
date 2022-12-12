<?php 
 
require_once "../../includes/config.php";

    //reservering.ReserveringID, reservering.Tafel, reservering.Datum, reservering.Tijd,  klant.Klantnaam, klant.Telefoon, reservering.Personen
if($_POST) {
    $id = $_POST['ReserveringID'];
    $klantid = $_POST['Klantid'];
    $tafel  = $_POST['Tafel'];
 	$datum  = $_POST['Datum'];
	$tijd  = $_POST['Tijd'];
	$klantnaam  = $_POST['Klantnaam'];
	$telefoon  = $_POST['Telefoon'];
	$personen = $_POST['Personen'];
	$reservatie = $_POST['Reservatie'];


 
    $sql = "UPDATE reservering, klant SET reservering.Tafel = '$tafel', reservering.Datum = '$datum', reservering.Tijd = '$tijd', reservering.Personen = '$personen', klant.Klantnaam = '$klantnaam', klant.Telefoon = '$telefoon', reservering.Reservatie = '$reservatie' WHERE reservering.ReserveringID = {$id} AND klant.Klantid = $klantid";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>De reservering is succesvol geupdate.</p>";
        echo "<a href='edit.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../../welcome.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error tijdens het updaten: ". $mysqli->error;
    }
 
    $mysqli->close();
 
}
 
?>
