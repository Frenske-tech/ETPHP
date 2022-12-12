<?php 
 
require_once "../../includes/config.php";

 
if($_POST) {
    $menuitem = $_POST['Menuitem'];
    $prijs  = $_POST['Prijs'];
 
    $id = $_POST['Menuitemcode'];
 
    $sql = "UPDATE menuitem SET Menuitem = '$menuitem', Prijs = '$prijs' WHERE Menuitemcode = {$id}";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>De prijs is succesvol geupdate.</p>";
        echo "<a href='edit.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../../welcome.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error tijdens het updaten: ". $mysqli->error;
    }
 
    $mysqli->close();
 
}
 
?>
