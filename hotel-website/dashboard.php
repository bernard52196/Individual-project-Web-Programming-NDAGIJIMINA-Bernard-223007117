<?php
session_start();
include "db.php";

// Protect page (only logged-in users)
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Get statistics
$orders_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM orders"))['total'];
$messages_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM messages"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Bernard Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== INLINE CSS FOR DASHBOARD ===== */
        .dashboard-container {
            max-width: 1300px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .stats-wrapper {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.2rem 2rem;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            flex: 1;
            min-width: 150px;
            transition: 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .stat-card i {
            font-size: 2.2rem;
            color: #c7a55b;
        }
        .stat-card h3 {
            margin: 0.5rem 0;
            color: #1e3c5c;
        }
        .stat-card .number {
            font-size: 2rem;
            font-weight: bold;
            color: #1e3c5c;
        }
        .page-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .page-header h2 {
            color: #1e3c5c;
            font-size: 1.8rem;
            border-bottom: 3px solid #c7a55b;
            display: inline-block;
            padding-bottom: 0.5rem;
        }
        .table-wrapper {
            overflow-x: auto;
            background: white;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .orders-table th {
            background: #1e3c5c;
            color: white;
            padding: 14px 8px;
            text-align: left;
        }
        .orders-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #e2e8f0;
            color: #333;
        }
        .orders-table tr:hover {
            background-color: #faf6ef;
        }
        .delete-btn {
            background: #dc2626;
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: bold;
            transition: 0.2s;
            display: inline-block;
        }
        .delete-btn:hover {
            background: #b91c1c;
            transform: scale(1.02);
        }
        .no-data {
            text-align: center;
            padding: 2rem;
            color: #666;
            font-style: italic;
        }
        .dashboard-actions {
            text-align: center;
            margin-top: 1rem;
        }
        .action-btn {
            display: inline-block;
            background: #c7a55b;
            color: #1e3c5c;
            padding: 8px 20px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: bold;
            margin: 0 5px;
            transition: 0.2s;
        }
        .action-btn:hover {
            background: #1e3c5c;
            color: white;
        }
        @media (max-width: 700px) {
            .orders-table th, .orders-table td {
                padding: 8px 4px;
                font-size: 0.75rem;
            }
            .stat-card {
                padding: 0.8rem 1rem;
            }
            .stat-card .number {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<div class="navbar">
    <h2 class="logo">🏨 Bernard Hotel</h2>
    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="messages.php">Messages</a>
        <a href="logout.php" class="login-btn">Logout</a>
    </div>
</div>

<!-- ===== HERO ===== -->
<div class="hero">
    <h1>Admin Dashboard</h1>
    <p>Manage orders, view messages, and control content</p>
</div>

<div class="dashboard-container">
    <!-- Statistics Cards -->
    <div class="stats-wrapper">
        <div class="stat-card">
            <i>📦</i>
            <h3>Total Orders</h3>
            <div class="number"><?php echo htmlspecialchars($orders_count); ?></div>
        </div>
        <div class="stat-card">
            <i>💬</i>
            <h3>Messages</h3>
            <div class="number"><?php echo htmlspecialchars($messages_count); ?></div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="page-header">
        <h2>📋 Customer Orders</h2>
    </div>

    <div class="table-wrapper">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Menu</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch orders ordered by newest first
                $result = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_date DESC, id DESC");
                
                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['menu_item']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                    <td>
                        <a href="delete_order.php?id=<?php echo urlencode($row['id']); ?>" 
                           class="delete-btn"
                           onclick="return confirm('Are you sure you want to delete this order?')">
                           🗑️ Delete
                        </a>
                    </td>
                </tr>
                <?php 
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="8" class="no-data">📭 No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="dashboard-actions">
        <a href="messages.php" class="action-btn">📩 View Messages</a>
        <a href="logout.php" class="action-btn">🚪 Logout</a>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<div class="footer">
    <p>© 2026 Bernard Hotel | Admin Dashboard</p>
</div>

</body>
</html>