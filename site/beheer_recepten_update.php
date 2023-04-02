<?php

require 'database.php';

$id = $_GET['id'];

// Haal de recept gegevens op uit de database
$stmt = $conn->prepare("SELECT * FROM recept WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$recept = $stmt->fetch(PDO::FETCH_ASSOC);

// Verwerk formulier
if (isset($_POST['submit'])) {
    // Haal de gegevens uit formulier
    $gebruiker_id = $_POST['gebruiker_id'];
    $naam = $_POST['naam'];
    $duur = $_POST['duur'];
    $soort = $_POST['soort'];
    $afbeelding = $_POST['afbeelding'];
    $instructie = $_POST['instructie'];
    $moeilijkheid = $_POST['moeilijkheid'];


    if (!empty($_POST["gebruiker_id"])) {

        $recept = $_POST["gebruiker_id"];

        // Update de gegevens van de recepten in de database
        $stmt = $conn->prepare("UPDATE recept SET gebruiker_id = :gebruiker_id, naam = :naam, duur = :duur, soort = :soort, afbeelding = :afbeelding, instructie = :instructie, moeilijkheid = :moeilijkheid WHERE id = :id");
        $stmt->bindParam(':gebruiker_id', $gebruiker_id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':duur', $duur);
        $stmt->bindParam(':soort', $soort);
        $stmt->bindParam(':afbeelding', $afbeelding);
        $stmt->bindParam(':instructie', $instructie);
        $stmt->bindParam(':moeilijkheid', $moeilijkheid);
        $stmt->bindParam('id', $id);
        $stmt->execute();

        header("location: beheer_recepten.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Recept</title>
</head>

<body>
    <section class="login">
        <form method="post" action="">
            <div>
                <label for="gebruiker_id">Gebruiker:</label>
                <input type="text" name="gebruiker_id" id="gebruiker_id" value="<?php echo $recept['gebruiker_id']; ?>">
            </div>
            <div>
                <label for="naam">Naam:</label>
                <input type="text" name="naam" id="naam" value="<?php echo $recept['naam']; ?>">
            </div>
            <div>
                <label for="duur">Duur:</label>
                <input type="text" name="duur" id="duur" value="<?php echo $recept['duur']; ?>">
            </div>
            <div>
                <label for="soort">Soort:</label>
                <input type="text" name="soort" id="soort" value="<?php echo $recept['soort']; ?>">
            </div>
            <div>
                <label for="afbeelding">afbeelding:</label>
                <input type="text" name="afbeelding" id="afbeelding" value="<?php echo $recept['afbeelding']; ?>">
            </div>
            <div>
                <label for="instructie">Instructie:</label>
                <input type="text" name="instructie" id="instructie" value="<?php echo $recept['instructie']; ?>">
            </div>
            <div>
                <label for="moeilijkheid">Moeilijkheid:</label>
                <input type="text" name="moeilijkheid" id="moeilijkheid" value="<?php echo $recept['moeilijkheid']; ?>">
            </div>
            <button type="submit" name="submit">Verzend</button>
        </form>
    </section>
</body>

</html>