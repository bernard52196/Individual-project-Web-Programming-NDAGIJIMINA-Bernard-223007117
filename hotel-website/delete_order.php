<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM orders WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>