<!DOCTYPE html>
<?php
include "db.php";
?>
<html>
<head>
    <title>Login - My Hotel</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- NAVBAR (same style as your home page) -->
<div class="navbar">
    <h2 class="logo">Bernard Hotel</h2>
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="menu.php">Menu</a>
        <a href="gallery.php">Gallery</a>
        <a href="order.php">Order</a>
        <a href="contact.php">Contact</a>
        <a href="login.php" class="login-btn">Login</a>
    </div>
</div>

<!-- LOGIN SECTION -->
<div class="content login-section">

    <h2>Login to Your Account</h2>
    <p>Enter your username and password to continue</p>

    <form method="POST" action="login.php" class="login-form">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login" class="btn">Login</button>

    </form>

</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2026 My Hotel | All Rights Reserved</p>
</div>

<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $_SESSION['user'] = $username;
        header("Location: dashboard.php");

    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

</body>
</html>