<?php
session_start();
require 'database.php';

$id = $_GET['id'];

// Haal de gebruikersgegevens op uit de database op basis van de gebruiker_id die is opgeslagen in de sessie
$stmt = $conn->prepare("SELECT * FROM ingredient WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$ingredient = $stmt->fetch(PDO::FETCH_ASSOC);

// Verwerk het formulier indien deze is verzonden
if (isset($_POST['submit'])) {
    // Haal de gegevens uit het formulier
    $naam = $_POST['naam'];


    if (!empty($_POST["naam"])) {

        $ingredient = $_POST["naam"];

        // Update de gebruikersgegevens in de database
        $stmt = $conn->prepare("UPDATE ingredient SET naam = :naam WHERE id = :id");
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("location: ingredienten.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Ingredient</title>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="login">

        <form method="post" action="">
            <div>
                <label for="naam">Naam:</label>
                <input type="text" name="naam" id="naam" value="<?php echo $ingredient['naam']; ?>">
            </div>
            <button type="submit" name="submit">Verzend</button>
        </form>

    </div>
</body>

</html>