<?php
session_start();

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    require 'database.php';

    $stmt = $conn->prepare("SELECT * FROM gebruiker WHERE email = :email AND wachtwoord = :wachtwoord");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":wachtwoord", $wachtwoord);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["gebruikerData"] = $user;
        $_SESSION["voornaam"] = $user["voornaam"];
        $_SESSION["achternaam"] = $user["achternaam"];
        $_SESSION["soort"] = $user["soort"];
        header("Location: index.php");
        exit;
    } else {
        echo "Onjuiste gebruikersnaam of wachtwoord";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <section class="login">
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br>
            <label for="password">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>
            <br>
            Nog geen account? Registreer<a href="registereren.php"> hier</a>
            <input type="submit" value="Log in" name="submit">
        </form>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>