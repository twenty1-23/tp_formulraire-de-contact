<?php
    
    define("IS_DEBUG", $_SERVER["HTTP_HOST"] == "localhost" ? true : false);
    
    $firstname = $lastname = $email = $message = "";
    $firstnameError = $lastnameError = $emailError = $messageError = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (IS_DEBUG) {
            echo "POST";
        }
        $firstname = isset($_POST['firstname']) ? checkInput($_POST['firstname']) :"";
        if(empty($firstname)) {
            $firstnameError = "Please enter a firstname";
        }
        $lastname = isset($_POST['lastname']) ? checkInput($_POST["lastname"]) :"";
        if(empty($lastname)) {
            $lastnameError = "Please enter a lastname";
        }
        $email = isset($_POST['email']) ? checkInput($_POST["email"]) :"";
        if (!checkEmail($email)) {
            $emailError = "Please check your email address";
        }
        $message = isset($_POST['message']) ? checkInput($_POST["message"]) :"";
        if (empty($message)) {
           $messageError = "Please enter a message";
        }

    }
    else {
        echo "No POST";
    }

    // function checkInput($input) {
    //     $input = trim($input);
    //     $input = stripcslashes($input);
    //     $input = htmlspecialchars($input);
    //         if (IS_DEBUG) {
    //             echo $input;
    //         }
    //     return $input;
            
    // }

    function checkInput($input) {
        return $input;
    }

    function checkEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function getError($errorMessage){
       return "<p class='error'>" . $errorMessage . "</p>";
    }
?>

<!doctype html>
<html lang="fr">

<?php require "head.php"; ?>

<body>
    <div id="formulaire">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="text" placeholder="firstname" name="firstname" value="<?php echo $firstname ?>" required>
            <input type="text" placeholder="lastname" name="lastname" value="<?php echo $lastname ?>" required>
            <input type="email" placeholder="exmemple@email.com" name="email" value="<?php echo $email ?>" required>

            <?php
                if($emailError !== ""){
                    echo getError($emailError);
                }
            ?>
            <textarea name="message" placeholder="message(optional)" id="text-area" cols="30" rows="10" style="display: block; margin: auto; width: 250px;"><?php echo $message ?></textarea>
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
</body>

</html>