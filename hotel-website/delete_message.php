<?php
session_start();
include "db.php";

// Protect page (only logged-in users)
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Check if ID is provided
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM messages WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        // Redirect back to messages page
        header("Location: messages.php");
        exit();

    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }

} else {
    echo "No ID provided!";
}
?>