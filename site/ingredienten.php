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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>naam</th>
            <th>aantal</th>
        </tr>
        <?php foreach ($all_ingredienten as $ingredient) : ?>
            <tr>
                <td><?php echo $ingredient["id"] ?></td>
                <td><?php echo $ingredient["naam"] ?></td>
                <td><?php echo $ingredient["aantal"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>