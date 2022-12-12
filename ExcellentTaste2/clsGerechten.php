<html>
<head>    
	<link rel="stylesheet" type="text/css" a href="styles/style.css">
    <title>Gerechten CRUD</title>
</head>
 <?php
//Include de database verbinding file
include_once("includes/config.php");
?>
 

<body>

 <?php
include_once 'includes/header.php'
?>

<main>
<a href="classes/gerechtenCRUD/add.html">Gerecht toevoegen</a><br/><br/>

    <table width='80%' border=0>
 <thead>
    <tr>
        <td>Gerechtcode</td>
        <td>Menuitem</td>
        <td>Prijs</td>
    </tr>
    </thead>
    <tbody>
    <?php     
    // Blijft rows aan maken zolang de result variabelen rows inleest, waardoor elke row in de database wordt toegevoegd in de tabel
    $sql = "SELECT * FROM menuitem ORDER BY Menuitemcode ASC";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {         
        echo "<tr>";
        echo "<td>".$row['Gerechtcode']."</td>";
        echo "<td>".$row['Menuitem']."</td>";
        echo "<td>".$row['Prijs']."</td>";
        // Voegt een Edit en Delete knop toe aan elke row
        echo "<td> <a href=\"classes/GerechtenCRUD/edit.php?id=$row[Menuitemcode]\">Edit</a> | <a href=\"classes/GerechtenCRUD/delete.php?id=$row[Menuitemcode]\" onClick=\"return confirm('Weet u zeker dat u dit gerecht wilt verwijderen?')\">Delete</a></td>";        
    }
    }
    ?>
    </tbody>
    </table>
  
	
</main>
</body>
</html>