<?php 
 
require_once "../../includes/config.php";

if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT menuitem.Menuitem, menuitem.Prijs, menuitem.Menuitemcode FROM menuitem WHERE menuitemcode = {$id}";
    $result = $mysqli->query($sql);
 
    $data = $result->fetch_assoc();
 
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productprijs aanpassen</title>
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
<br/>
    <legend>Edit Product</legend>
 
    <form action="update.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Menu item</th>
                <td><input type="text" name="Menuitem" placeholder="Menuitem" value="<?php echo $data['Menuitem'] ?>" /></td>

                
                <th>Prijs</th>
                <td><input type="text" name="Prijs" placeholder="Prijs" value="<?php echo $data['Prijs'] ?>" /></td>

            </tr>
            <tr>
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
