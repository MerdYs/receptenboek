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
    <title>De Turkse keuken</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
</body>

</html>