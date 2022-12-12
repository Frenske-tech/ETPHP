<html>
<head>
    <title>Speler toevoegen</title>
</head>
 
<body>
<?php
//Include de database verbinding file
include_once("../../includes/config2.php");

if(isset($_POST['Submit'])) {    
    $gerechtcode	 	= $_POST['gerechtcode'];
    $menuitem		 	= $_POST['menuitem'];
    $prijs	 			= $_POST['prijs'];
        
    // Checkt voor lege velden in de submit, geeft dan foutmeldingen en een back knop aan indien nodig
    if(empty($gerechtcode) || empty($menuitem) || empty($prijs)){
            
		if(empty($gerechtcode)) {
            echo "<font color='red'>U heeft geen Gerechtcode ingevuld.</font><br/>";
        }
                           
		if(empty($menuitem)) {
            echo "<font color='red'>U heeft geen Menuitem ingevuld.</font><br/>";
        }
        
        if(empty($prijs)) {
            echo "<font color='red'>U heeft geen Prijs ingevuld.</font><br/>";
        }    


        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    else { 
     	//Voegt de ingevulde gegevens toe in de tabel volgens de aangemaakte query
        $sql = "INSERT INTO menuitem(gerechtcode, menuitem, prijs) VALUES(:gerechtcode, :menuitem, :prijs)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':gerechtcode', $gerechtcode);
        $query->bindparam(':menuitem', $menuitem);         
        $query->bindparam(':prijs', $prijs);
        $query->execute();
        echo "<font color='green'>Gerecht toegevoegd.";
        echo "<br/><a href='../../clsGerechten.php'>Zie Resultaat</a>";
    }
 
 		}
		

 
?>
</body>
</html>