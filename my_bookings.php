<?php 
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    redirect('login.php');
}

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT b.*, p.name as package_name, p.image_url as package_image 
                      FROM bookings b 
                      JOIN packages p ON b.package_id = p.id 
                      WHERE b.user_id = ?
                      ORDER BY b.booking_date DESC");
$stmt->execute([$userId]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings | Travel Inspire Hub</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .booking-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin: 20px 0;
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .booking-card img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
        }

        .booking-details {
            flex-grow: 1;
        }

        .booking-details h2 {
            margin: 0;
            color: #34495e;
        }

        .booking-details p {
            margin: 8px 0;
            color: #555;
        }

        .status {
            font-weight: bold;
            text-transform: capitalize;
        }

        .status.pending {
            color: orange;
        }

        .status.confirmed {
            color: green;
        }

        .status.cancelled {
            color: red;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Bookings</h1>

        <?php if (empty($bookings)): ?>
            <p style="text-align: center;">You have no bookings yet. <a href="index.php">Browse packages</a></p>
        <?php else: ?>
            <?php foreach ($bookings as $booking): ?>
                <div class="booking-card">
                    <?php if ($booking['package_image']): ?>
                        <img src="<?php echo htmlspecialchars($booking['package_image']); ?>" alt="Package Image">
                    <?php endif; ?>
                    <div class="booking-details">
                        <h2><?php echo htmlspecialchars($booking['package_name']); ?></h2>
                        <p><strong>Booking Date:</strong> <?php echo date('M j, Y', strtotime($booking['booking_date'])); ?></p>
                        <p><strong>Travel Date:</strong> <?php echo date('M j, Y', strtotime($booking['travel_date'])); ?></p>
                        <p><strong>Persons:</strong> <?php echo $booking['persons']; ?></p>
                        <p><strong>Total Price:</strong> $<?php echo number_format($booking['total_price'], 2); ?></p>
                        <p><strong>Status:</strong> 
                            <span class="status <?php echo strtolower($booking['status']); ?>">
                                <?php echo ucfirst($booking['status']); ?>
                            </span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <a class="back-link" href="index.php">← Back to Packages</a>
    </div>
</body>
</html>
