<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>    
	<link rel="stylesheet" type="text/css" a href="styles/style.css"/>
    <title>Index</title>
</head>
 <?php
include_once 'includes/header.php'
?>

<body>
 
 <main>

    <table width='80%'>
 <thead>
    <tr>
        <td>Tafel</td>
        <td>Datum</td>
    	<td>Tijd</td>
    	<td>Naam</td>
    	<td>Telefoonnummer</td>
    	<td>Aantal personen</td>
    </tr>
    </thead>
    <tbody>
    <?php   
    //including the database connection file
	require_once "config.php";
  
     $sql = "SELECT reservering.ReserveringID, reservering.Tafel, reservering.Datum, reservering.Tijd,  klant.Klantnaam, klant.Telefoon, reservering.Aantal FROM reservering JOIN Klant ON reservering.Klantid = klant.Klantid ORDER BY datum, tijd ASC";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {       	
		echo "<td>".$row['Tafel']."</td>";
		echo "<td>".$row['Datum']."</td>";
        echo "<td>".$row['Tijd']."</td>";
    	echo "<td>".$row['Klantnaam']."</td>";
    	echo "<td>".$row['Telefoon']."</td>";
    	echo "<td>".$row['Aantal']."</td>";
    	echo "<td> <a href='bestelling.php?id=".$row['ReserveringID']."'><button type='button'>Bestelling toevoegen</button></a>. </td>";
    	echo "</tr>";
     }
    }
     
    ?>
    </tbody>
    </table>
 </main>
</body>
</html>
