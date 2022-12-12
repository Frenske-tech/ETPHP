<html>
<head>
    <title>Reservering toevoegen</title>
</head>
 
<body>
<?php
//Include de database verbinding file
include_once("../../includes/config2.php");


if(isset($_POST['Submit'])) {    
    
    $menuitemcode 		= $_POST['Menuitemcode'];
    $datum 				= $_POST['Datum']; 
    $tijd 				= $_POST['Tijd']; 
    $aantal				= $_POST['Aantal'];
    $prijs				= $_POST['Prijs'];
    $tafel			 	= $_POST['Tafel'];
    
        
    // Checkt voor lege velden in de submit, geeft dan foutmeldingen en een back knop aan indien nodig
    if(empty($menuitemcode) || empty($prijs) || empty($aantal) || empty($datum)  || empty($tijd) ||  empty($tafel)){
            
        
        
        if(empty($menuitemcode)) {
            echo "<font color='red'>U heeft geen Menuitem gekozen.</font><br/>";
        }


        if(empty($prijs)) {
            echo "<font color='red'>U heeft geen Prijs ingevuld, de totaalprijs kan niet worden uitgerekend.</font><br/>";
        }

        if(empty($aantal)) {
            echo "<font color='red'>U heeft geen Aantal ingevuld, de totaalprijs kan niet worden uitgerekend.</font><br/>";
        }
                   
		if(empty($datum)) {
            echo "<font color='red'>U heeft de Datum niet ingevuld.</font><br/>";
        }
        
        if(empty($tafel)) {
            echo "<font color='red'>U heeft geen Tafel gekozen.</font><br/>";
        }

        
        if(empty($tijd)) {
            echo "<font color='red'>U heeft geen tijd ingevuld.</font><br/>";
        }    

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    else { 
     	//Voegt de ingevulde gegevens toe in de tabel volgens de aangemaakte query
     	//$menuitemcode $totaalprijs $datum $tijd $tafel
     	$totaalprijs = $prijs * $aantal;
     	$contant = $_POST['Contant'];
        $sql = "INSERT INTO bestelling(Menuitemcode, Aantal, Datum, Tijd, Totaalprijs, Contant, Tafel) VALUES(:Menuitemcode, :Aantal, :Datum, :Tijd, :Totaalprijs, :Contant, :Tafel)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':Menuitemcode', $menuitemcode);
        $query->bindparam(':Aantal', $aantal);
        $query->bindparam(':Datum', $datum);       
        $query->bindparam(':Tijd', $tijd);
        $query->bindparam(':Totaalprijs', $totaalprijs);
        $query->bindparam(':Tafel', $tafel);
        $query->bindparam(':Contant', $contant);
        $query->execute();
        echo "<font color='green'>Bestelling toegevoegd.";
        echo "<br/><a href='../../clsBestellingen.php'>Zie Resultaat</a>";
    }
 
 
		}
		

 
?>
</body>
</html>