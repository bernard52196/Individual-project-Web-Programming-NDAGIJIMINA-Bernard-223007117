<!DOCTYPE html>
<html>
<head>
    <title>Menu - Bernard Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== INLINE CSS FOR MENU PAGE ===== */
        .menu-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .category {
            margin-bottom: 2.5rem;
            background: white;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .category h3 {
            background: #1e3c5c;
            color: #ffd966;
            padding: 1rem 1.5rem;
            margin: 0;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .category h3 i {
            font-size: 1.4rem;
        }
        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .menu-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            transition: 0.2s;
        }
        .menu-list li:last-child {
            border-bottom: none;
        }
        .menu-list li:hover {
            background: #faf6ef;
            transform: translateX(5px);
        }
        .item-name {
            font-size: 1.1rem;
            font-weight: 500;
            color: #1e3c5c;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .item-name i {
            color: #c7a55b;
            width: 24px;
            text-align: center;
        }
        .item-price {
            font-weight: bold;
            color: #c7a55b;
            background: #f0f0f0;
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            font-size: 0.9rem;
        }
        .order-now-btn {
            display: inline-block;
            margin-top: 2rem;
            background: #1e3c5c;
            color: white;
            padding: 12px 28px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
            text-align: center;
        }
        .order-now-btn:hover {
            background: #c7a55b;
            color: #1e3c5c;
            transform: translateY(-2px);
        }
        @media (max-width: 600px) {
            .menu-list li {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            .item-price {
                align-self: flex-start;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR (from external CSS) ===== -->
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

<!-- ===== HERO ===== -->
<div class="hero">
    <h1>Our Menu</h1>
    <p>Delicious meals, fresh drinks & natural juices</p>
</div>

<div class="menu-container">
    <!-- Food Category -->
    <div class="category">
        <h3><i>🍽️</i> Food</h3>
        <ul class="menu-list">
            <li>
                <span class="item-name"><i>🍚</i> Rice & Beans</span>
                <span class="item-price">5,000 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🐟</i> Fried Fish</span>
                <span class="item-price">4,500 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🍗</i> Grilled Chicken</span>
                <span class="item-price">7,000 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🍛</i> Chicken Curry with Rice</span>
                <span class="item-price">8,000 RWF</span>
            </li>
        </ul>
    </div>

    <!-- Drinks Category -->
    <div class="category">
        <h3><i>🥤</i> Soft Drinks</h3>
        <ul class="menu-list">
            <li>
                <span class="item-name"><i>🥤</i> Coca Cola</span>
                <span class="item-price">1,000 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🥤</i> Fanta (Orange/Pineapple)</span>
                <span class="item-price">1,000 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🧃</i> Sprite</span>
                <span class="item-price">1,000 RWF</span>
            </li>
        </ul>
    </div>

    <!-- Liquor Category -->
    <div class="category">
        <h3><i>🍾</i> Liquor / Alcohol</h3>
        <ul class="menu-list">
            <li>
                <span class="item-name"><i>🍺</i> Bazook (Strong Drink)</span>
                <span class="item-price">1,500 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🍺</i> Primus Beer</span>
                <span class="item-price">1,200 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🍷</i> Red Wine (Glass)</span>
                <span class="item-price">3,000 RWF</span>
            </li>
        </ul>
    </div>

    <!-- Juices Category -->
    <div class="category">
        <h3><i>🥭</i> Fresh Juices</h3>
        <ul class="menu-list">
            <li>
                <span class="item-name"><i>🥭</i> Passion Juice</span>
                <span class="item-price">1,500 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🍊</i> Orange Juice</span>
                <span class="item-price">2,000 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🍍</i> Pineapple Juice</span>
                <span class="item-price">2,000 RWF</span>
            </li>
            <li>
                <span class="item-name"><i>🥤</i> Mixed Fruit Juice</span>
                <span class="item-price">2,500 RWF</span>
            </li>
        </ul>
    </div>

    <div style="text-align: center;">
        <a href="order.php" class="order-now-btn">🛒 Order Now →</a>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<div class="footer">
    <p>© 2026 Bernard Hotel | All Rights Reserved</p>
</div>

</body>
</html>