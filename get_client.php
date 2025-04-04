<?php
include 'database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM clients WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $client = $result->fetch_assoc();
    echo json_encode($client);
} else {
    echo "No client found";
}

$conn->close();
