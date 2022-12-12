<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "includes/config.php";
 
// Definieërt de variabelen en initialiseert ze met lege values waardoor de gegevens van het form kunnen worden ingevoerd.
$username = $password = "";
$username_err = $password_err = "";
 
// Processeert de gegevens van het form zodra het gestuurd wordt.
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Checkt of de textbox van het gebruikersnaam leeg is
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Checkt of de textbox van het wachtwoord leeg is
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valideert de gebruiker's gegevens
    if(empty($username_err) && empty($password_err)){
        // Start het select statement op om de correcte gegevens uit de database te halen
        $sql = "SELECT id, class, username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind de variabele aan het statement dat wordt ingesteld
            $stmt->bind_param("s", $param_username);
            
            // Zet parameters van de username klaar
            $param_username = $username;
            
            // Probeert het ingestelde statement te executeren
            if($stmt->execute()){
                // Slaat het resultaat op
                $stmt->store_result();
                
                // Checkt of de gebruikersnaam bestaat, en zowel, verifieërt het wachtwoord.
                if($stmt->num_rows == 1){                    
                    // Bind de variabelen van het resultaat
                    $stmt->bind_result($id, $class, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, dus de nieuwe session wordt begonnen
                            session_start();
                            
                           
                            // Stopt de data in de session variabelen zodat ze blijven opgeslagen totdat de session voorbij is
                            $_SESSION["loggedin"] = true;
                            $_SESSION["class"] = $class;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Brengt gebruiker door naar de homepagina, welcome.php
                            header("location: welcome.php");
                        } else{
                            // Laat een error zien zodra het wachtwoord niet klopt
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Laat een error zien zodra de gebruikersnaam niet klopt
                    $username_err = "No account found with that username.";
                }
                	// Onverwachte/onspecifieke error met geen directe foutmelding voor
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Sluit statement
        $stmt->close();
    }
    
    // Sluit verbinding
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loginpagina Excellent Taste</title>
    <link rel="stylesheet" href="css/stylesheet.css"/>
    <style type="text/css">
        body{ font: 14px sans-serif; background-color:#6699FF; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div> <br />
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="includes/register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>