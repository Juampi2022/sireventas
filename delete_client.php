<?php
include 'database.php';

$id = $_POST['id'];

$sql = "DELETE FROM clients WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Client deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
