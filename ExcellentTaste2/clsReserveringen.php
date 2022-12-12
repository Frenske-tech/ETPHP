<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>    
	<link rel="stylesheet" type="text/css" a href="styles/style.css"/>
    <title>Reserveringen</title>
</head>
 <?php
include_once 'includes/header.php'
?>

<body>
 
 <main>
<a href="classes/ReserveringCRUD/add.html">Reservering toevoegen</a><br/><br/>

    <table width='80%'>
 <thead>
    <tr>
        
        <td>Datum</td>
    	<td>Tijd</td>
    	<td>Tafel</td>
    	<td>Naam</td>
    	<td>Telefoonnummer</td>
    	<td>Aantal personen</td>
    	<td>Reservering gebruikt?</td>
    </tr>
    </thead>
    <tbody>
    <?php   
    //including the database connection file
	require_once "includes/config.php";
  
     $sql = "SELECT reservering.ReserveringID, reservering.Tafel, reservering.Datum, reservering.Tijd,  klant.Klantnaam, klant.Telefoon, reservering.Personen, reservering.Reservatie FROM reservering JOIN Klant ON reservering.Klantid = klant.Klantid ORDER BY datum, tijd ASC";
            $result = $mysqli->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {       	
		
		echo "<td>".$row['Datum']."</td>";
        echo "<td>".$row['Tijd']."</td>";
        echo "<td>".$row['Tafel']."</td>";
    	echo "<td>".$row['Klantnaam']."</td>";
    	echo "<td>".$row['Telefoon']."</td>";
    	echo "<td>".$row['Personen']."</td>";
    	echo "<td>".$row['Reservatie']."</td>";
    	echo "<td> <a href=\"classes/ReserveringCRUD/edit.php?id=$row[ReserveringID]\">Edit</a> | <a href=\"classes/ReserveringCRUD/delete.php?id=$row[ReserveringID]\" onClick=\"return confirm('Weet u zeker dat u deze reservering wilt verwijderen?')\">Delete</a></td>";
    	echo "</tr>";
     }
    }
    
    ?>
    </tbody>
    </table>
 </main>
</body>
</html>
