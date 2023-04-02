<?php
session_start();
require 'database.php';



if (isset($_POST['submit'])) {

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $stmt = $conn->prepare("INSERT INTO gebruiker (voornaam, achternaam, email, wachtwoord) 
    VALUES (:voornaam, :achternaam, :email, :wachtwoord)");
    $stmt->bindParam(":voornaam", $voornaam);
    $stmt->bindParam(":achternaam", $achternaam);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":wachtwoord", $wachtwoord);
    $stmt->execute();

    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registereren</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <section class="register">
        <form action="" method="post">
            <label for="voornaam">Voornaam:</label>
            <input type="text" name="voornaam" id="voornaam" required><br>

            <label for="achternaam">Achternaam:</label>
            <input type="text" name="achternaam" id="achternaam" required><br>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" name="wachtwoord" id="wachtwoord" required><br>

            <input type="submit" value="Registreren" name="submit">
        </form>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>