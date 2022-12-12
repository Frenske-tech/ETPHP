<?php 
 
require_once "../../includes/config.php";

if($_GET['id']) {
    $id = $_GET['id'];
 	
    $sql = "SELECT bestelling.BestellingID, bestelling.Tafel, bestelling.Contant, menuitem.Menuitemcode, bestelling.Aantal, bestelling.Totaalprijs, bestelling.Datum, bestelling.Tijd FROM bestelling JOIN menuitem ON bestelling.Menuitemcode = menuitem.Menuitemcode WHERE BestellingID = {$id}";
    $result = $mysqli->query($sql);
 
 	//fetcht row result als geassocieerde array
    $data = $result->fetch_assoc();
 
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bestelling aanpassen</title>
	<link rel="stylesheet" href="../../styles/style.css">
    <style type="text/css">
        legend{
			padding-top:10px;
		}
        fieldset {
            
            width: 80%;
            height: 80%;
            background-color:#CCCC00;
            
        }
        table tr th {
            padding-right:15px;
           	padding-bottom:40px;
           }
        td {
	padding-right:15px;
	padding-bottom:40px;
	}
    </style>
 
</head>
<body>
<?
 include_once 'includes/header.php'
 ?>

<fieldset>

    <legend>Edit Bestelling</legend>
 
    <form action="update.php" method="post">
        <table cellspacing="0" cellpadding="0">
                 

		
       
             <tr>   
                <td>Tafel</td>
                <td><input type="text" name="Tafel" placeholder="Tafel" value="<?php echo $data['Tafel'] ?>" /></td>
			</tr>
			<tr>
              	<td>Aantal</td>
                <td><input type="text" name="Aantal" placeholder="Aantal" value="<?php echo $data['Aantal'] ?>" /></td>
			</tr>

            <tr>
				<td>Datum</td>
                <td><input type="text" name="Datum" placeholder="Datum" value="<?php echo $data['Datum'] ?>" /></td> 
            </tr>
            
            <tr>
              	<td>Tijd</td>
                <td><input type="text" name="Tijd" placeholder="Tijd" value="<?php echo $data['Tijd'] ?>" /></td>
             </tr>

            <tr>
              	<td>Contantgeld Klant</td>
                <td><input type="text" name="Contant" placeholder="Contant" value="<?php echo $data['Contant'] ?>" /></td>
             </tr>


            <tr>
            	<input type="hidden" name="Totaalprijs" value="<?php echo $data['Totaalprijs']?>" /> <br/>
                <input type="hidden" name="BestellingID" value="<?php echo $data['BestellingID']?>" /><br/>
                <input type="hidden" name="Menuitemcode" value="<?php echo $data['Menuitemcode']?>" /><br/><br/>

                <td><button type="submit">Verandering opslaan</button></td><br/>
                <td><a href="../../welcome.php"><button type="button">Terug</button></a></td>
            </tr>
        </table>
        <br/>
    </form>
</fieldset>
 
</body>
</html>
 