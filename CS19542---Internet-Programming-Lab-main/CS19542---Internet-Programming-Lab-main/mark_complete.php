<?php
$conn = new mysqli("localhost", "root", "", "task_manager",3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "UPDATE tasks SET status=1 WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: dashboard.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
