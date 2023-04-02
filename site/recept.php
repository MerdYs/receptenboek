<?php
session_start();
require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM recept WHERE recept.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$recept = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT *, recept.id AS recept_ID, ingredient.naam AS ingredient_naam FROM recept
LEFT JOIN recept_ingredient ON recept_ingredient.recept_id = recept.id
LEFT JOIN ingredient ON ingredient.id = recept_ingredient.ingredient_id
WHERE recept.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$ingredienten = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recept van <?php echo $recept["naam"]; ?></title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-md-6">
                <div class="card w-100">
                    <img src="images/<?php echo $recept['afbeelding']; ?>">
                    <div class="container">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="container">
                        <h5><b><?php echo $recept['naam']; ?></b></h5>
                        <p>Soort: <?php echo $recept['soort']; ?></p>
                        <p>Duur: <?php echo $recept['duur']; ?> min</p>
                        <p>moeilijkheid <?php echo $recept['moeilijkheid']; ?></p>
                        <?php if ($_SESSION['gebruikerData']['id'] == $recept['gebruiker_id']) { ?>

                            <a href="beheer_recepten_update.php?id=<?php echo $recept["id"] ?>"><button type="submit">Update</button></a>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h1>Instructie</h1>

                <h3>Ingrediënten</h3>
                <?php foreach ($ingredienten as $ingredient) { ?>
                    <p> <?php echo $ingredient["aantal"] . " " . $ingredient["ingredient_naam"]; ?> </p>
                <?php } ?>
                <h3>Bereidingswijze:</h3>
                <p><?php echo $recept['instructie']; ?></p>
                <?php ?>
            </div>
        </div>
    </div>


    </div>

</body>

</html>