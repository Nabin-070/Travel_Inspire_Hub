<?php
include 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}

// Validate package ID
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$packageId = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id = ?");
$stmt->execute([$packageId]);
$package = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$package) {
    die('Package not found.');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $travelDate = $_POST['travel_date'];
    $persons = (int)$_POST['persons'];

    if ($persons < 1 || $persons > 10) {
        $error = "Invalid number of persons.";
    } else {
        $totalPrice = $package['price'] * $persons;

        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, package_id, travel_date, persons, total_price) 
                              VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $packageId, $travelDate, $persons, $totalPrice]);

        header('Location: booking_confirmation.php?id=' . $pdo->lastInsertId());
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book <?php echo htmlspecialchars($package['name']); ?> | Travel Inspire Hub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .booking-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin-bottom: 16px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }

        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .price-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #555;
        }

        .error {
            color: red;
            margin-bottom: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h1>Book "<?php echo htmlspecialchars($package['name']); ?>"</h1>
        <p>Booking as: <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></p>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="post">
            <div>
                <label for="travel_date">Travel Date:</label>
                <input type="date" id="travel_date" name="travel_date" required min="<?php echo date('Y-m-d'); ?>">
            </div>

            <div>
                <label for="persons">Number of Persons:</label>
                <input type="number" id="persons" name="persons" min="1" max="10" value="1" required>
            </div>

            <div class="price-info">
                <p>💲 Price per person: <strong>$<?php echo number_format($package['price'], 2); ?></strong></p>
                <p>Total price will be calculated after submission.</p>
            </div>

            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</body>
</html>
