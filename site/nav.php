<?php
require 'database.php';

$sql = "SELECT COUNT(id) AS aantal_recepten FROM recept";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$aantal_recepten = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Navbar</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navbar">
        <ul>
            <h3>
                Project Turkse Keuken
            </h3>
            <h6>
                <?php
                if (isset($_SESSION["voornaam"]) && isset($_SESSION["achternaam"]) && isset($_SESSION["soort"])) {
                    echo  $_SESSION["voornaam"] . " " . $_SESSION["achternaam"] . " " . "Is nu ingelogd als" . " " . $_SESSION["soort"];
                }
                ?>

            </h6>
        </ul>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
            if (isset($_SESSION["soort"]) && $_SESSION["soort"] == "Beheerder") {
                echo '<li><a href="ingredienten.php">Ingredienten</a></li>';
                echo '<li><a href="recepten.php">Recepten</a></li>';
                echo '<li><a href="specials.php">Filters</a></li>';
                echo '<li><a href="beheer_recepten.php">Recepten Bhr</a></li>';
                echo '<li><a href="beheer_gebruikers.php">Gebruikers</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            }

            if (!isset($_SESSION["soort"])) {
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="registereren.php">Registreer</a></li>';
            } else if (isset($_SESSION["soort"]) && $_SESSION["soort"] == "Gebruiker") {
                echo '<li><a href="ingredienten.php">Ingredienten</a></li>';
                echo '<li><a href="recepten.php">Recepten</a></li>';
                echo '<li><a href="specials.php">Filters</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            }

            ?>
            <h6>ER ZIJN MOMENTEEL <?php echo $aantal_recepten['aantal_recepten']; ?> RECEPTEN BESCHIKBAAR</h6>
        </ul>

    </div>
</body>

</html>