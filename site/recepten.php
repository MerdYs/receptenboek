<?php
session_start();
require 'database.php';

$stmt = $conn->prepare("SELECT * FROM recept");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recepten</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <div class="row">
        <?php foreach ($recepten as $recept) { ?>

            <div class="col-md-4">
                <div class="card w-100">
                    <img src="images/<?php echo $recept["afbeelding"] ?>">
                    <div class="container">
                        <h4><b><?php echo $recept["naam"] ?></b></h4>
                        <a href="recept.php?id=<?php echo $recept["id"] ?>"><button>Bekijk</button></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>

</html>