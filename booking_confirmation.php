<?php 
include 'config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$bookingId = $_GET['id'];
$stmt = $pdo->prepare("SELECT b.*, p.name as package_name, p.price as package_price 
                      FROM bookings b 
                      JOIN packages p ON b.package_id = p.id 
                      WHERE b.id = ?");
$stmt->execute([$bookingId]);
$booking = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$booking) {
    die('Booking not found');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation | Travel Inspire Hub</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .confirmation-box {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #28a745;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        strong {
            color: #222;
        }

        .status {
            padding: 10px;
            background-color: #e9f7ef;
            color: #155724;
            border-radius: 6px;
            margin-top: 20px;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h1>✅ Booking Confirmed!</h1>
        <h2>Thank you for your reservation</h2>

        <p><strong>Package:</strong> <?php echo htmlspecialchars($booking['package_name']); ?></p>
        <p><strong>Travel Date:</strong> <?php echo htmlspecialchars($booking['travel_date']); ?></p>
        <p><strong>Number of Persons:</strong> <?php echo (int)$booking['persons']; ?></p>
        <p><strong>Total Price:</strong> $<?php echo number_format($booking['total_price'], 2); ?></p>
        <p><strong>Booking Reference:</strong> <?php echo $booking['id']; ?></p>

        <div class="status">
            Your booking status is: <strong><?php echo htmlspecialchars($booking['status']); ?></strong><br>
            We will contact you shortly with further details.
        </div>

        <a class="back-link" href="index.php">← Back to Packages</a>
    </div>
</body>
</html>
