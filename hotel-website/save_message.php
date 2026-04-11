<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $location = $_POST['location'];
    $message  = $_POST['message'];

    $sql = "INSERT INTO messages (fullname, email, phone, location, message)
            VALUES ('$fullname', '$email', '$phone', '$location', '$message')";

    if (mysqli_query($conn, $sql)) {

        // redirect back with success message
        header("Location: contact.php?success=1");
        exit();

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>