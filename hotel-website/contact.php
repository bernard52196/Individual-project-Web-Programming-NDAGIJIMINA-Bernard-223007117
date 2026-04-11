<!DOCTYPE html>
<html>
<head>
    <title>Contact - Bernard Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ===== CONTACT PAGE INLINE STYLES ===== */
        .contact-wrapper {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .contact-form-box, .contact-info-box {
            flex: 1;
            min-width: 280px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 2rem;
            transition: 0.3s;
        }
        .contact-form-box h2, .contact-info-box h2 {
            color: #1e3c5c;
            margin-bottom: 1.5rem;
            border-left: 5px solid #c7a55b;
            padding-left: 1rem;
        }
        .contact-form-box input, 
        .contact-form-box textarea {
            width: 100%;
            padding: 12px 16px;
            margin: 8px 0 16px;
            border: 1px solid #ddd;
            border-radius: 40px;
            font-size: 1rem;
            transition: 0.2s;
            font-family: inherit;
        }
        .contact-form-box textarea {
            border-radius: 24px;
            resize: vertical;
        }
        .contact-form-box input:focus, 
        .contact-form-box textarea:focus {
            border-color: #c7a55b;
            outline: none;
            box-shadow: 0 0 0 3px rgba(199,165,91,0.2);
        }
        .contact-form-box button {
            background: #1e3c5c;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 40px;
            cursor: pointer;
            width: 100%;
            transition: 0.2s;
        }
        .contact-form-box button:hover {
            background: #c7a55b;
            transform: translateY(-2px);
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 0.8rem;
            background: #f8f9fa;
            border-radius: 60px;
            transition: 0.2s;
        }
        .info-item:hover {
            background: #eef2f7;
            transform: translateX(5px);
        }
        .info-item i {
            width: 40px;
            height: 40px;
            background: #1e3c5c;
            color: #ffd966;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        .info-item .details {
            flex: 1;
        }
        .info-item .details h3 {
            margin: 0;
            font-size: 1rem;
            color: #1e3c5c;
        }
        .info-item .details p {
            margin: 0;
            color: #555;
        }
        .success-message {
            max-width: 800px;
            margin: 1rem auto 0;
            padding: 0.8rem;
            background: #d4edda;
            color: #155724;
            border-left: 6px solid #28a745;
            border-radius: 12px;
            text-align: center;
            font-weight: bold;
        }
        .map-placeholder {
            margin-top: 2rem;
            background: #e9ecef;
            border-radius: 20px;
            padding: 1rem;
            text-align: center;
            color: #1e3c5c;
        }
        .map-placeholder i {
            font-size: 3rem;
            color: #c7a55b;
        }
        @media (max-width: 768px) {
            .contact-wrapper {
                flex-direction: column;
            }
            .info-item {
                padding: 0.6rem;
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

<!-- ===== HERO (same as other pages) ===== -->
<div class="hero">
    <h1>Contact Us</h1>
    <p>We are here to help you anytime</p>
</div>

<!-- Success message display -->
<?php if (isset($_GET['success'])): ?>
    <div class="success-message">
        <i class="fas fa-check-circle"></i> Message sent successfully! We'll get back to you soon.
    </div>
<?php endif; ?>

<!-- Two-column layout: Form + Contact Info -->
<div class="contact-wrapper">
    <!-- Contact Form -->
    <div class="contact-form-box">
        <h2><i class="fas fa-envelope"></i> Send Us a Message</h2>
        <form action="save_message.php" method="POST">
            <input type="text" name="fullname" placeholder="Full Name *" required>
            <input type="email" name="email" placeholder="Email Address *" required>
            <input type="text" name="phone" placeholder="Phone Number *" required>
            <input type="text" name="location" placeholder="Your Location (City/Area) *" required>
            <textarea name="message" rows="5" placeholder="Your Message *" required></textarea>
            <button type="submit" name="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
        </form>
    </div>

    <!-- Contact Information with Icons -->
    <div class="contact-info-box">
        <h2><i class="fas fa-address-card"></i> Our Contact Details</h2>
        
        <div class="info-item">
            <i class="fas fa-envelope"></i>
            <div class="details">
                <h3>Email</h3>
                <p>benhotel@gmail.com</p>
            </div>
        </div>

        <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <div class="details">
                <h3>Phone / WhatsApp</h3>
                <p>+250 781 331 478</p>
            </div>
        </div>

        <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <div class="details">
                <h3>Location</h3>
                <p>Kigali, Rwanda (Near Convention Centre)</p>
            </div>
        </div>

        <div class="info-item">
            <i class="fas fa-clock"></i>
            <div class="details">
                <h3>Opening Hours</h3>
                <p>Monday – Sunday: 24/7</p>
            </div>
        </div>

        <!-- Simple map placeholder (you can replace with Google Maps iframe) -->
        <div class="map-placeholder">
            <i class="fas fa-map"></i>
            <p><strong>Find us easily</strong><br>We are located in the heart of Kigali.</p>
        </div>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<div class="footer">
    <p>© 2026 Bernard Hotel | All Rights Reserved</p>
</div>

</body>
</html>