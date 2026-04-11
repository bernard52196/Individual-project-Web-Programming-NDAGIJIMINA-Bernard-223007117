<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order - Bernard Hotel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
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

<!-- HERO -->
<div class="hero">
    <h1>Place Your Order</h1>
    <p>Fill the form below to order your favorite meal & drinks</p>
</div>

<!-- FORM SECTION -->
<div class="form-container">

    <?php if (isset($_SESSION['order_message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['order_type']; ?>">
            <?php 
                echo htmlspecialchars($_SESSION['order_message']);
                unset($_SESSION['order_message']);
                unset($_SESSION['order_type']);
            ?>
        </div>
    <?php endif; ?>

    <form action="save_order.php" method="POST" class="order-form">
        <h2>Order Details</h2>

        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Phone Number" required>

        <select name="menu_item" required>
            <option value="">-- Select Menu Item --</option>
            <!-- Food -->
            <option value="Rice & Beans">🍚 Rice & Beans - 5,000 RWF</option>
            <option value="Fried Fish">🐟 Fried Fish - 4,500 RWF</option>
            <option value="Grilled Chicken">🍗 Grilled Chicken - 7,000 RWF</option>
            <option value="Chicken Curry with Rice">🍛 Chicken Curry with Rice - 8,000 RWF</option>
            <!-- Soft Drinks -->
            <option value="Coca Cola">🥤 Coca Cola - 1,000 RWF</option>
            <option value="Fanta">🥤 Fanta - 1,000 RWF</option>
            <option value="Sprite">🧃 Sprite - 1,000 RWF</option>
            <!-- Liquor -->
            <option value="Bazook">🍺 Bazook - 1,500 RWF</option>
            <option value="Primus Beer">🍺 Primus Beer - 1,200 RWF</option>
            <option value="Red Wine">🍷 Red Wine - 3,000 RWF</option>
            <!-- Juices -->
            <option value="Passion Juice">🥭 Passion Juice - 1,500 RWF</option>
            <option value="Orange Juice">🍊 Orange Juice - 2,000 RWF</option>
            <option value="Pineapple Juice">🍍 Pineapple Juice - 2,000 RWF</option>
            <option value="Mixed Fruit Juice">🥤 Mixed Fruit Juice - 2,500 RWF</option>
        </select>

        <input type="text" name="address" placeholder="Delivery Address" required>
        <input type="date" name="order_date" required>

        <button type="submit" name="submit">Place Order</button>
    </form>
</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2026 Bernard Hotel | All Rights Reserved</p>
</div>

</body>
</html>