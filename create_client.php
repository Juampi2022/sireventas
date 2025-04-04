<?php
include 'database.php';

$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$origin = $_POST['origin'] ?? '';
$project = $_POST['project'] ?? '';
$eventType = $_POST['eventType'] ?? '';
$nextEventDate = $_POST['nextEventDate'] ?? '';
$horaVisita = $_POST['horaVisita'] ?? '';
$observation = $_POST['observation'] ?? '';

if (empty($name) || empty($phone) || empty($origin) || empty($project) || empty($eventType) || empty($nextEventDate) || empty($horaVisita)) {
    echo "Error: Todos los campos son obligatorios.";
    exit;
}

$sql = "INSERT INTO clients (name, phone, origin, project, eventType, nextEventDate, horaVisita, observation) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo "Error al preparar la declaración: " . $conn->error;
    exit;
}

$stmt->bind_param("ssssssss", $name, $phone, $origin, $project, $eventType, $nextEventDate, $horaVisita, $observation);

if ($stmt->execute() === TRUE) {
    echo "New client created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
