<?php
include 'config.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings | TravelEase Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="mb-4">Manage Bookings</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Booking ID</th>
                    <th>Package</th>
                    <th>User</th>
                    <th>Travel Date</th>
                    <th>Persons</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT b.*, p.name as package_name, u.username 
                                     FROM bookings b
                                     JOIN packages p ON b.package_id = p.id
                                     JOIN users u ON b.user_id = u.id
                                     ORDER BY b.booking_date DESC");
                while ($booking = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = match ($booking['status']) {
                        'pending' => 'text-warning',
                        'confirmed' => 'text-success',
                        'cancelled' => 'text-danger',
                        default => 'text-secondary',
                    };
                    
                    echo '<tr>
                            <td>' . $booking['id'] . '</td>
                            <td>' . htmlspecialchars($booking['package_name']) . '</td>
                            <td>' . htmlspecialchars($booking['username']) . '</td>
                            <td>' . date('M j, Y', strtotime($booking['travel_date'])) . '</td>
                            <td>' . $booking['persons'] . '</td>
                            <td>$' . number_format($booking['total_price'], 2) . '</td>
                            <td class="' . $statusClass . '">' . ucfirst($booking['status']) . '</td>
                            <td>
                                <a href="view_booking.php?id=' . $booking['id'] . '" class="btn btn-sm btn-info">View</a>
                                <a href="edit_booking.php?id=' . $booking['id'] . '" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                          </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
