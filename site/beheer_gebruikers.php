<?php
session_start();
require "database.php";


$stmt = $conn->prepare("SELECT * FROM gebruiker");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$all_gebruikers = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Database van gebruikers</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>voornaam</th>
            <th>achternaam</th>
            <th>email</th>
            <th>wachtwoord</th>
            <th>soort</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?php foreach ($all_gebruikers as $gebruiker) : ?>
            <tr>
                <td><?php echo $gebruiker["id"] ?></td>
                <td><?php echo $gebruiker["voornaam"] ?></td>
                <td><?php echo $gebruiker["achternaam"] ?></td>
                <td><?php echo $gebruiker["email"] ?></td>
                <td><?php echo $gebruiker["wachtwoord"] ?></td>
                <td><?php echo $gebruiker["soort"] ?></td>
                <td><a href="beheer_gebruikers_update.php?id=<?php echo $gebruiker["id"] ?>">Update</a></td>
                <td><a href="beheer_gebruikers_delete.php?id=<?php echo $gebruiker["id"] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>