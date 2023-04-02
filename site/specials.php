<?php
session_start();
require 'database.php';

$stmt = $conn->prepare("SELECT *, recept.id AS recept_ID FROM recept
ORDER BY duur DESC");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten_duurheid = $stmt->fetchAll();



$stmt = $conn->prepare("SELECT *, recept.id AS recept_ID FROM recept
ORDER BY moeilijkheid DESC");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten_moeilijkheid = $stmt->fetchAll();



$stmt = $conn->prepare("SELECT recept.naam, SUM(recept_ingredient.aantal) as total, recept.duur AS duur, recept.soort AS soort,
recept.moeilijkheid AS moeilijkheid, recept.instructie AS instructies, recept.id AS recept_ID
FROM recept_ingredient
JOIN recept ON recept.id = recept_ingredient.recept_id 
GROUP BY recept.naam 
ORDER BY total DESC;");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten_ingredienten = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Specials</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <form action="" method="post">
        <a href="specials.php"><button type="submit" name="tijdsduur">Filter op langste recept</button></a>
        <a href="specials.php"><button type="submit" name="moeilijkheid">Filter op moeilijkheid</button></a>
        <a href="specials.php"><button type="submit" name="ingredienten">Filter op meeste ingrediënten</button></a>
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php if (isset($_POST['tijdsduur'])) { ?>

        <table class="table">
            <tr>
                <th>Titel</th>
                <th>Duur</th>
                <th>Menugang</th>
                <th>Instructie</th>
                <th>Moeilijkheid</th>
            </tr>

            <?php foreach ($recepten_duurheid as $recept) { ?>

                <tr>
                    <td> <?php echo $recept["naam"] ?> </td>
                    <td> <?php echo $recept["duur"] ?> </td>
                    <td> <?php echo $recept["soort"] ?> </td>
                    <td> <?php echo $recept["instructie"] ?> </td>
                    <td> <?php echo $recept["moeilijkheid"] ?> </td>
                </tr>

            <?php } ?>
        </table>

    <?php } else if (isset($_POST['moeilijkheid'])) { ?>

        <table class="table">
            <tr>
                <th>Titel</th>
                <th>Duur</th>
                <th>Menugang</th>
                <th>Instructie</th>
                <th>Moeilijkheid</th>
            </tr>

            <?php foreach ($recepten_moeilijkheid as $recept) { ?>

                <tr>
                    <td> <?php echo $recept["naam"] ?> </td>
                    <td> <?php echo $recept["duur"] ?> </td>
                    <td> <?php echo $recept["soort"] ?> </td>
                    <td> <?php echo $recept["instructie"] ?> </td>
                    <td> <?php echo $recept["moeilijkheid"] ?> </td>
                </tr>

            <?php } ?>
        </table>
    <?php } else if (isset($_POST['ingredienten'])) { ?>
        <table class="table">
            <tr>
                <th>Titel</th>
                <th>Duur</th>
                <th>Menugang</th>
                <th>Instructie</th>
                <th>Moeilijkheid</th>
            </tr>

            <?php foreach ($recepten_ingredienten as $recept) { ?>

                <tr>
                    <td> <?php echo $recept["naam"] ?> </td>
                    <td> <?php echo $recept["duur"] ?> </td>
                    <td> <?php echo $recept["soort"] ?> </td>
                    <td> <?php echo $recept["instructies"] ?> </td>
                    <td> <?php echo $recept["moeilijkheid"] ?> </td>
                </tr>

            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>