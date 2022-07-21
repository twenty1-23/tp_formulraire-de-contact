<?php
    
    define("IS_DEBUG", $_SERVER["HTTP_HOST"] == "localhost" ? true : false);

    $firstname = $lastname = $subject = $email = $message = "";
    $firstnameError = $lastnameError = $subjectError = $emailError = $messageError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(IS_DEBUG){
            echo "POST";
        }
        // firstname
        $firstname = isset($_POST["firstname"]) ? checkInput($_POST["firstname"]) : "";

        if(empty($firstname)){
            $firstnameError = "Veuillez renseigner votre prénom.";
        }
        // lastname
        $lastname = isset($_POST["lastname"]) ? checkInput($_POST["lastname"]) : "";
        if(empty($lastname)){
            $lastnameError = "Veuillez renseigner votre nom.";
        }
        //
        $subject = isset($_POST["subject"]) ? checkInput($_POST["subject"]) : "";
        if(empty($subject)){
            $subjectError = "Veuillez renseigner le sujet.";
        }
        //
        $email = isset($_POST["email"]) ? checkInput($_POST["email"]) : "";
        if(!isEmail($email)){
            $emailError = "Veuillez vérifier votre email.";
        }
        //
        $message = isset($_POST["message"]) ? checkInput($_POST["message"]) : "";
        if(empty($message)){
            $messageError = "Veuillez taper votre message.";
        }
    }else{
        if(IS_DEBUG){
            echo "Pas POST";
        }
    }

    function checkInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        if(IS_DEBUG){
            echo $input;
            echo "<br>";
        }
        return $input;
    }

    function isEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function getError($error){
        $html = '<p class="error">' . $error .'</p>'; 
        return $html; 
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <input type="text" placeholder="Prénom" name="firstname" value="<?php echo $firstname ?>" required>
            <input type="text" placeholder="Nom" name="lastname" value="<?php echo $lastname ?>" required>
            <input type="text" placeholder="Sujet" name="subject" value="<?php echo $subject ?>" required>
            <input type="email" placeholder="exemple@email.com" name="email" value="<?php echo $email ?>" required>
            <?php 
                if($emailError != ""){
                    echo getError($emailError);   
                }
            ?>
            <!-- <p class="error">Veuillez vérifier votre email.</p> -->
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
