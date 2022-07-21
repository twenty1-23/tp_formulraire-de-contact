<?php
    
    define("IS_DEBUG", $_SERVER["HTTP_HOST"] == "localhost" ? true : false);

    $firstname = $lastname = $subject = $email = $message = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(IS_DEBUG){
            echo "POST";
        }
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $subject = $_POST["subject"];
        $email = $_POST["email"];
        $message = $_POST["message"];
    }else{
        if(IS_DEBUG){
            echo "Pas POST";
        }

    }
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>TP Discord</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css" media="all and (max-width: 768px)">
</head>

<body>
    <div id="formulaire"> 
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <input type="text" placeholder="Prénom" name="firstname" value="<?php echo $firstname ?>" required>
            <input type="text" placeholder="Nom" name="lastname" value="<?php echo $lastname ?>" required>
            <input type="text" placeholder="Sujet" name="subject" value="<?php echo $subject ?>" required>
            <input type="text" placeholder="exemple@email.com" name="email" value="<?php echo $email ?>" required>
            <textarea cols="30" placeholder="Tapez votre message." rows="10" name="message" required><?php echo $message ?></textarea>
            <!-- <input type="password" placeholder="mot de passe" required> -->
            <!-- <div id="select"> 
            <select name="date">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <select name="month">
                <option>Janviers</option>
                <option>Février</option>
                <option>Mars</option>
                <option>Avril</option>
                <option>Mai</option>
            </select>
            <select>
                <option>2021</option>
                <option> 2022</option>
                <option> 2023</option>
                <option> 2024</option>
                <option> 2025</option>
            </select>
            </div> -->
            <input type="submit" value="ENVOYER">
        </form>
    </div>
</body></html>
