<!DOCTYPE html>
<html>
<head>
    <title>Gallery - Bernard Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== GALLERY SPECIFIC STYLES (inline) ===== */
        .gallery-title {
            text-align: center;
            padding: 2rem 1rem 1rem;
        }
        .gallery-title h1 {
            color: #1e3c5c;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        .gallery-title p {
            font-size: 1.1rem;
            color: #555;
        }

        /* Grid layout */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Food card */
        .food-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            text-align: center;
            padding: 1.2rem;
            transition: all 0.3s ease;
        }
        .food-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 30px rgba(0,0,0,0.12);
        }
        .food-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 16px;
        }
        .food-card h3 {
            margin: 1rem 0 0.5rem;
            color: #1e3c5c;
            font-size: 1.3rem;
        }
        .food-card p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
        }
        .food-card span {
            display: block;
            font-weight: bold;
            color: #c7a55b;
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }
        .order-btn {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            background: #1e3c5c;
            color: white;
            text-decoration: none;
            border-radius: 40px;
            font-weight: bold;
            transition: 0.2s;
            margin-top: 0.5rem;
        }
        .order-btn:hover {
            background: #c7a55b;
            color: #1e3c5c;
            transform: scale(1.02);
        }

        /* Open time banner */
        .open-time {
            text-align: center;
            background: #1e3c5c;
            color: #ffd966;
            padding: 1.2rem;
            margin: 1rem 0 0;
            font-size: 1.1rem;
            font-weight: bold;
        }

        /* Responsive */
        @media (max-width: 700px) {
            .gallery-grid {
                padding: 1rem;
                gap: 1rem;
            }
            .gallery-title h1 {
                font-size: 1.8rem;
            }
            .food-card img {
                height: 150px;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR (same as about.php) ===== -->
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

<!-- ===== HERO (matching other pages) ===== -->
<div class="hero">
    <h1>Our Food Gallery</h1>
    <p>Explore our delicious meals & refreshing drinks</p>
</div>

<div class="gallery-title">
    <h1>Welcome to Bernard's Hotel</h1>
    <p>Delicious Food & Drinks Available 24/7</p>
</div>

<!-- ===== GALLERY GRID ===== -->
<div class="gallery-grid">

    <div class="food-card">
        <img src="images/food1.jpg" alt="Grilled Fish">
        <h3>Grilled Fish</h3>
        <p>Fresh and delicious grilled fish</p>
        <span>5,000 RWF</span>
        <a href="order.php" class="order-btn">Order Now</a>
    </div>

    <div class="food-card">
        <img src="images/food2.jpg" alt="Fresh Juice">
        <h3>Fresh Juice</h3>
        <p>Natural and healthy juice</p>
        <span>2,000 RWF</span>
        <a href="order.php" class="order-btn">Order Now</a>
    </div>

    <div class="food-card">
        <img src="images/food3.jpg" alt="Bazook Drink">
        <h3>Bazook Drinks</h3>
        <p>Cold refreshing drinks</p>
        <span>15,000 RWF</span>
        <a href="order.php" class="order-btn">Order Now</a>
    </div>

    <div class="food-card">
        <img src="images/food4.jpg" alt="Chicken Meal with Rice">
        <h3>Chicken Meal & Rice</h3>
        <p>Tasty fried chicken with Indian rice</p>
        <span>7,000 RWF</span>
        <a href="order.php" class="order-btn">Order Now</a>
    </div>

    <div class="food-card">
        <img src="images/food5.jpg" alt="Soft Drink">
        <h3>Soft Drink</h3>
        <p>Refreshing soft drink</p>
        <span>8,000 RWF</span>
        <a href="order.php" class="order-btn">Order Now</a>
    </div>

    <!-- You can add more cards here -->
</div>

<div class="open-time">
    <h2>⭐ We are open Monday to Sunday — 24/7 ⭐</h2>
</div>

<!-- ===== FOOTER (same as other pages) ===== -->
<div class="footer">
    <p>© 2026 Bernard Hotel | All Rights Reserved</p>
</div>

</body>
</html>