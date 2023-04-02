<?php
session_start();
require "database.php";


$stmt = $conn->prepare("SELECT * FROM recept");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$all_recepten = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Database van recepten</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>gebruiker_id</th>
            <th>naam</th>
            <th>duur</th>
            <th>soort</th>
            <th>afbeelding</th>
            <th>instructie</th>
            <th>moeilijkheid</th>
        </tr>
        <?php foreach ($all_recepten as $recept) : ?>
            <tr>
                <td><?php echo $recept["id"] ?></td>
                <td><?php echo $recept["gebruiker_id"] ?></td>
                <td><?php echo $recept["naam"] ?></td>
                <td><?php echo $recept["duur"] ?></td>
                <td><?php echo $recept["soort"] ?></td>
                <td><?php echo $recept["afbeelding"] ?></td>
                <td><?php echo $recept["instructie"] ?></td>
                <td><?php echo $recept["moeilijkheid"] ?></td>
                <td><a href="beheer_recepten_update.php?id=<?php echo $recept["id"] ?>">Update</a></td>
                <td><a href="beheer_recepten_delete.php?id=<?php echo $recept["id"] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>