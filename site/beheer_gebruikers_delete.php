<?php

require 'database.php';

$id = $_GET['id'];
// Gebruikersgegevens worden gedelete uit de database
$delete = $conn->prepare("DELETE FROM gebruiker WHERE id = :id ");
$delete->bindParam(':id', $id);

if ($delete->execute()) {
    header("location: beheer_gebruikers.php");
}
