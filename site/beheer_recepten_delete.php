<?php

require 'database.php';

$id = $_GET['id'];

$delete = $conn->prepare("DELETE FROM recept WHERE id = :id ");
$delete->bindParam('id', $id);

if ($delete->execute()) {
    header("location: beheer_recepten.php");
}
