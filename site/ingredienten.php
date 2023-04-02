<?php
session_start();
require "database.php";


$stmt = $conn->prepare("SELECT * FROM ingredient");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$all_ingredienten = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lijst van ingrediënten</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>update</th>
        </tr>
        <?php foreach ($all_ingredienten as $ingredient) : ?>
            <tr>
                <td><?php echo $ingredient["id"] ?></td>
                <td><?php echo $ingredient["naam"] ?></td>
                <td><a href="ingredienten_update.php?id=<?php echo $ingredient["id"] ?>">update</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>