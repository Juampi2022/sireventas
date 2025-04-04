<?php
include 'database.php';

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$origin = $_POST['origin'];
$project = $_POST['project'];
$eventType = $_POST['eventType'];
$nextEventDate = $_POST['nextEventDate'];
$horaVisita = $_POST['horaVisita'];
$observation = $_POST['observation'];

$sql = "UPDATE clients SET name='$name', phone='$phone', origin='$origin', project='$project', eventType='$eventType', nextEventDate='$nextEventDate', horaVisita='$horaVisita', observation='$observation' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Client updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
