<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {}
    else {
        echo "No POST";
    }
?>

<!doctype html>
<html lang="fr">

<?php require "./element/head.php"; ?>

<body>
    <div id="formulaire">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="text" placeholder="firstname" name="firstname" required>
            <input type="text" placeholder="lastname" name="lastname" required>
            <input type="email" placeholder="exmemple@email.com" required>
            <textarea name="message"  placeholder="message(optional)" id="text-area" cols="30" rows="10" style="display: block; margin: auto; width: 250px;"></textarea>
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