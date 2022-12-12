<?php 
 
require_once "../../includes/config.php";

    //Haalt de edited gegevens op
    $id 			= $_POST['BestellingID'];
    $tafel  		= $_POST['Tafel'];
	$menuitemcode  	= $_POST['Menuitemcode'];
	$aantal  		= $_POST['Aantal'];
	$totaalprijs 	= $_POST['Totaalprijs'];
	$contant		= $_POST['Contant'];
 	$datum  		= $_POST['Datum'];
	$tijd  			= $_POST['Tijd'];



 		//Probeert de Database te updaten
       $sql = "UPDATE bestelling, menuitem SET bestelling.Tafel = '$tafel', bestelling.Aantal = '$aantal', bestelling.Totaalprijs = '$totaalprijs', bestelling.Contant = '$contant', bestelling.Datum = '$datum', bestelling.Tijd = '$tijd' WHERE bestelling.BestellingID = {$id} AND menuitem.menuitemcode = '$menuitemcode'";
    //Laat de gebruiker weten of de update lukte en stuurt ze naar andere pagina's
    if($mysqli->query($sql) === TRUE) {
        echo "<p>De bestelling is succesvol geupdate.</p>";
        echo "<a href='edit.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../../welcome.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error tijdens het updaten: ". $mysqli->error;
    }
 
    $mysqli->close();
 

 
?>
