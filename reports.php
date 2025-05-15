<?php
include 'config.php';

// Admin check
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports | TravelEase Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container my-5">
    <h2 class="mb-4">Reports Dashboard</h2>

    <div class="row g-4">
        <!-- Booking Statistics -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📅 Monthly Booking Statistics (<?php echo date('Y'); ?>)</h5>
                </div>
                <div class="card-body">
                    <?php
                    $stmt = $pdo->query("SELECT MONTH(booking_date) as month, COUNT(*) as count 
                                         FROM bookings 
                                         WHERE YEAR(booking_date) = YEAR(CURRENT_DATE)
                                         GROUP BY MONTH(booking_date)");
                    $monthlyBookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <?php if (count($monthlyBookings) > 0): ?>
                        <ul class="list-group">
                            <?php foreach ($monthlyBookings as $booking): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo date('F', mktime(0, 0, 0, $booking['month'], 1)); ?>
                                    <span class="badge bg-secondary"><?php echo $booking['count']; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No booking data available for this year.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Revenue Report -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">💰 Revenue Report</h5>
                </div>
                <div class="card-body">
                    <?php
                    // Total revenue
                    $stmt = $pdo->query("SELECT SUM(total_price) as total FROM bookings");
                    $totalRevenue = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <h6>Total Revenue:</h6>
                    <p class="fw-bold text-success fs-5">$<?php echo number_format($totalRevenue['total'], 2); ?></p>

                    <?php
                    // Revenue by package
                    $stmt = $pdo->query("SELECT p.name, SUM(b.total_price) as total 
                                         FROM bookings b
                                         JOIN packages p ON b.package_id = p.id
                                         GROUP BY p.name
                                         ORDER BY total DESC");
                    $revenueByPackage = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <h6 class="mt-4">Revenue by Package</h6>
                    <?php if (count($revenueByPackage) > 0): ?>
                        <ul class="list-group">
                            <?php foreach ($revenueByPackage as $package): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo htmlspecialchars($package['name']); ?>
                                    <span class="badge bg-info text-dark">$<?php echo number_format($package['total'], 2); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No revenue data found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
