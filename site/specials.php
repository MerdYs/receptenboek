<?php

require 'database.php';

$stmt = $conn->prepare("SELECT *, recept.id AS recept_ID FROM recept
ORDER BY duur DESC");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten_duurheid = $stmt->fetchAll();



$stmt = $conn->prepare("SELECT *, recept.id AS recept_ID FROM recept
ORDER BY moeilijkheid ASC");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten_moeilijkheid = $stmt->fetchAll();



/* $stmt = $conn->prepare("SELECT recept.titel, SUM(aantal_ingredient.aantal) as total, recept.duur AS duur, recept.menugang AS menugang,
recept.moeilijkheid AS moeilijkheid, recept.instructies AS instructies, recept.id AS recept_ID
FROM aantal_ingredient
JOIN recept ON recept.id = aantal_ingredient.recept_id 
GROUP BY recept.titel 
ORDER BY total DESC;");
$stmt->execute(); 

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recepten_ingredienten = $stmt->fetchAll();
*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <a href="specials.php"><button type="submit" name="tijdsduur">Filter op langste recept</button></a>
        <a href="specials.php"><button type="submit" name="moeilijkheid">Filter op moeilijkheid</button></a>
        <a href="specials.php"><button type="submit" name="ingredienten">Filter op meeste ingrediënten</button></a>
    </form>
    <?php if (isset($_POST['tijdsduur'])) { ?>

        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Duur</th>
                    <th>Menugang</th>
                    <th>Moeilijkheid</th>
                    <th>Instructies</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($recepten_duurheid as $recept) { ?>

                    <tr>
                        <td> <?php echo $recept["naam"] ?> </td>
                        <td> <?php echo $recept["duur"] ?> </td>
                        <td> <?php echo $recept["soort"] ?> </td>
                        <td> <?php echo $recept["moeilijkheid"] ?> </td>
                        <td> <?php echo $recept["instructie"] ?> </td>
                        <td> <a href="beheer_recepten_update.php?id=<?php echo $recept["id"] ?>"> Update</a></td>
                        <td> <a href="beheer_recepten_delete.php?id=<?php echo $recept["id"] ?>"> Delete</a></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    <?php } else if (isset($_POST['moeilijkheid'])) { ?>

        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Duur</th>
                    <th>Menugang</th>
                    <th>Moeilijkheid</th>
                    <th>Instructies</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($recepten_moeilijkheid as $recept) { ?>

                    <tr>
                        <td> <?php echo $recept["naam"] ?> </td>
                        <td> <?php echo $recept["duur"] ?> </td>
                        <td> <?php echo $recept["soort"] ?> </td>
                        <td> <?php echo $recept["moeilijkheid"] ?> </td>
                        <td> <?php echo $recept["instructie"] ?> </td>
                        <td> <a href="beheer_recepten_update.php?id=<?php echo $recept["id"] ?>"> Update Data </a> </td>
                        <td> <a href="beheer_recepten_delete.php?id=<?php echo $recept["id"] ?>"> Delete Data </a> </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</body>

</html>