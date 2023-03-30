<?php
session_start();
require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM recept WHERE recept.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$recept = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT *, recept.id AS recept_ID, ingredient.naam AS ingredient_naam
FROM recept
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
    <title>Recept voor baklava</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                <p><?php echo $ingredienten['ingredient_naam'] ?></p>


                <h3>Bereidingswijze:</h3>
                <p><?php echo $recept['instructie']; ?></p>
                <?php ?>
            </div>
        </div>
    </div>


    </div>

</body>

</html>