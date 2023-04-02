<?php
session_start();
require 'database.php';

$id = $_GET['id'];

// Gebruikersgegevens worden opgehaald uit de database
$stmt = $conn->prepare("SELECT * FROM gebruiker WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

// Verwerk formulier
if (isset($_POST['submit'])) {
    // Haal de gegevens uit het formulier
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];


    if (!empty($_POST["voornaam"])) {

        $gebruiker = $_POST["voornaam"];

        // Update de gebruikersgegevens in de database
        $stmt = $conn->prepare("UPDATE gebruiker SET voornaam = :voornaam, achternaam = :achternaam, email = :email, wachtwoord = :wachtwoord WHERE id = :id");
        $stmt->bindParam(':voornaam', $voornaam);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("location: beheer_gebruikers.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Gebruiker</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="login">

        <form method="post" action="">
            <div>
                <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" value="<?php echo $gebruiker['voornaam']; ?>">
            </div>
            <div>
                <label for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" id="achternaam" value="<?php echo $gebruiker['achternaam']; ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $gebruiker['email']; ?>">
            </div>
            <div>
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="text" name="wachtwoord" id="wachtwoord" value="<?php echo $gebruiker['wachtwoord']; ?>">
            </div>
            <button type="submit" name="submit">Verzend</button>
        </form>

    </div>
</body>

</html>