<?php
include 'config.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'admin') {
    header('Location: login.php');
    exit();
}

// Get admin name for display (fallback to email if full_name doesn't exist)
$adminName = $_SESSION['full_name'] ?? $_SESSION['email'] ?? 'Admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Travel Inspire Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
        }
        body {
            padding-top: 80px;
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 80px;
            left: 0;
            bottom: 0;
            width: 250px;
            background-color: var(--secondary-color);
            color: white;
            padding: 20px 0;
        }
        .sidebar-link {
            color: white;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: var(--primary-color);
            color: white;
        }
        .sidebar-link i {
            margin-right: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .stat-card {
            border-radius: 10px;
            padding: 20px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .stat-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        .bg-success {
            background-color: #28a745 !important;
        }
        .bg-warning {
            background-color: #ffc107 !important;
        }
        .bg-danger {
            background-color: #dc3545 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Travel Inspire Hub Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> <?php echo htmlspecialchars($adminName); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <a href="admin_dashboard.php" class="sidebar-link active">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="manage_packages.php" class="sidebar-link">
            <i class="fas fa-suitcase"></i> Manage Packages
        </a>
        <a href="manage_bookings.php" class="sidebar-link">
            <i class="fas fa-calendar-check"></i> Manage Bookings
        </a>
        <a href="manage_users.php" class="sidebar-link">
            <i class="fas fa-users"></i> Manage Users
        </a>
        <a href="reports.php" class="sidebar-link">
            <i class="fas fa-chart-bar"></i> Reports
        </a>
        <a href="logout.php" class="sidebar-link">
            <i class="fas fa-cog"></i> logout
        </a>
    </div>

    <div class="main-content">
        <h2 class="mb-4">Admin Dashboard</h2>
        
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card bg-primary">
                    <i class="fas fa-suitcase"></i>
                    <h3>
                        <?php 
                        $stmt = $pdo->query("SELECT COUNT(*) FROM packages");
                        echo $stmt->fetchColumn();
                        ?>
                    </h3>
                    <p>Total Packages</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-success">
                    <i class="fas fa-calendar-check"></i>
                    <h3>
                        <?php 
                        $stmt = $pdo->query("SELECT COUNT(*) FROM bookings");
                        echo $stmt->fetchColumn();
                        ?>
                    </h3>
                    <p>Total Bookings</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-warning">
                    <i class="fas fa-users"></i>
                    <h3>
                        <?php 
                        $stmt = $pdo->query("SELECT COUNT(*) FROM users");
                        echo $stmt->fetchColumn();
                        ?>
                    </h3>
                    <p>Total Users</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-danger">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>
                        <?php 
                        $stmt = $pdo->query("SELECT SUM(total_price) FROM bookings");
                        $revenue = $stmt->fetchColumn();
                        echo '$' . number_format($revenue ? $revenue : 0, 2);
                        ?>
                    </h3>
                    <p>Total Revenue</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Recent Bookings</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Package</th>
                                        <th>User</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   $stmt = $pdo->query("
    SELECT b.id, p.name as package_name, 
           COALESCE(u.full_name, CONCAT(u.first_name, ' ', u.last_name), u.username, u.email) as user_name, 
           b.booking_date 
    FROM bookings b
    JOIN packages p ON b.package_id = p.id
    JOIN users u ON b.user_id = u.id
    ORDER BY b.booking_date DESC LIMIT 5
");
                                    while ($booking = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<tr>
                                                <td>' . $booking['id'] . '</td>
                                                <td>' . htmlspecialchars($booking['package_name']) . '</td>
                                                <td>' . htmlspecialchars($booking['user_name']) . '</td>
                                                <td>' . date('M j, Y', strtotime($booking['booking_date'])) . '</td>
                                              </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="manage_bookings.php" class="btn btn-primary mt-2">View All Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Recent Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $pdo->query("
                                        SELECT id, 
                                               COALESCE(full_name, email) as display_name, 
                                               email, created_at 
                                        FROM users 
                                        ORDER BY created_at DESC 
                                        LIMIT 5
                                    ");
                                    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<tr>
                                                <td>' . $user['id'] . '</td>
                                                <td>' . htmlspecialchars($user['display_name']) . '</td>
                                                <td>' . htmlspecialchars($user['email']) . '</td>
                                                <td>' . date('M j, Y', strtotime($user['created_at'])) . '</td>
                                              </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="manage_users.php" class="btn btn-primary mt-2">View All Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>