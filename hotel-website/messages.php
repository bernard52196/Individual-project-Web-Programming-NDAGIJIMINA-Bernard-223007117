<?php
session_start();
include "db.php";

// Protect page – only logged-in users can view messages
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages - Bernard Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== INLINE CSS FOR MESSAGES PAGE ===== */
        .messages-container {
            max-width: 1300px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .page-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .page-header h2 {
            color: #1e3c5c;
            font-size: 2rem;
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
        }
        .messages-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .messages-table th {
            background: #1e3c5c;
            color: white;
            padding: 14px 8px;
            text-align: left;
            font-weight: 600;
        }
        .messages-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
            color: #333;
        }
        .messages-table tr:hover {
            background-color: #faf6ef;
        }
        .message-text {
            max-width: 250px;
            white-space: normal;
            word-break: break-word;
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
        .no-messages {
            text-align: center;
            padding: 2rem;
            color: #666;
            font-style: italic;
        }
        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            background: #c7a55b;
            color: #1e3c5c;
            padding: 8px 20px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }
        .back-link:hover {
            background: #1e3c5c;
            color: white;
        }
        @media (max-width: 768px) {
            .messages-table th, .messages-table td {
                padding: 8px 4px;
                font-size: 0.75rem;
            }
            .delete-btn {
                padding: 3px 8px;
                font-size: 0.7rem;
            }
            .message-text {
                max-width: 150px;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<div class="navbar">
    <h2 class="logo">Bernard Hotel</h2>
    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php" class="login-btn">Logout</a>
    </div>
</div>

<!-- ===== HERO (matching other pages) ===== -->
<div class="hero">
    <h1>Customer Messages</h1>
    <p>View and manage inquiries from your guests</p>
</div>

<div class="messages-container">
    <div class="page-header">
        <h2>📩 All Messages</h2>
    </div>

    <div class="table-wrapper">
        <table class="messages-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch messages ordered by newest first
                $result = mysqli_query($conn, "SELECT * FROM messages ORDER BY created_at DESC");
                
                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                        <td class="message-text"><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        <td>
                            <a href="delete_message.php?id=<?php echo urlencode($row['id']); ?>" 
                               class="delete-btn"
                               onclick="return confirm('Delete this message permanently?')">
                               🗑️ Delete
                            </a>
                        </td>
                    </tr>
                <?php 
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="8" class="no-messages">📭 No messages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div style="text-align: center;">
        <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<div class="footer">
    <p>© 2026 Bernard Hotel | Admin Panel</p>
</div>

</body>
</html>