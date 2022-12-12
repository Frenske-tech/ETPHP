<html>
<head>
    <title>Reservering toevoegen</title>
</head>
 
<body>
<?php
//Include de database verbinding file
include_once("../../includes/config2.php");


if(isset($_POST['Submit'])) {    
    $klantid		 	= $_POST['Klantid'];
    $datum 				= $_POST['Datum']; 
    $tijd 				= $_POST['Tijd']; 
    $personen 			= $_POST['Personen']; 
    $tafel			 	= $_POST['Tafel'];
    $reservatie	 		= $_POST['Reservatie'];
        
    // Checkt voor lege velden in de submit, geeft dan foutmeldingen en een back knop aan indien nodig
    if(empty($klantid) || empty($datum) || empty($tijd) || empty($personen) || empty($tafel) || empty($reservatie)){
            
		if(empty($klantid)) {
            echo "<font color='red'>U heeft geen klant gekozen.</font><br/>";
        }
        
        
        if(empty($datum)) {
            echo "<font color='red'>U heeft geen Datum ingevuld.</font><br/>";
        }


        if(empty($Tijd)) {
            echo "<font color='red'>U heeft geen Tijd ingevuld.</font><br/>";
        }

                           
		if(empty($personen)) {
            echo "<font color='red'>U heeft het aantal Personen niet ingevuld.</font><br/>";
        }
        
        if(empty($tafel)) {
            echo "<font color='red'>U heeft geen Tafel gekozen.</font><br/>";
        }

        
        if(empty($reservatie)) {
            echo "<font color='red'>U heeft geen Reservatie-optie gekozen.</font><br/>";
        }    


        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    else { 
     	//Voegt de ingevulde gegevens toe in de tabel volgens de aangemaakte query
     	//Klantid, datum, tijd, personen, tafel, reservatie
        $sql = "INSERT INTO reservering(Klantid, Datum, Tijd, Personen, Tafel, Reservatie) VALUES(:Klantid, :Datum, :Tijd, :Personen, :Tafel, :Reservatie)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':Klantid', $klantid);
        $query->bindparam(':Datum', $datum);       
        $query->bindparam(':Tijd', $tijd);
        $query->bindparam(':Personen', $personen);
        $query->bindparam(':Tafel', $tafel);
        $query->bindparam(':Reservatie', $reservatie);
        $query->execute();
        echo "<font color='green'>Reservering toegevoegd.";
        echo "<br/><a href='../../clsReserveringen.php'>Zie Resultaat</a>";
    }
 
 
		}
		

 
?>
</body>
</html>