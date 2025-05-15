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
    <title>Manage Packages | TravelEase Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">Manage Packages</h2>

    <div class="mb-3 text-end">
        <a href="add_package.php" class="btn btn-primary">+ Add New Package</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price (USD)</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM packages ORDER BY id DESC");
                while ($package = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                            <td>' . $package['id'] . '</td>
                            <td>' . htmlspecialchars($package['name']) . '</td>
                            <td>$' . number_format($package['price'], 2) . '</td>
                            <td>' . htmlspecialchars($package['duration']) . ' days</td>
                            <td>
                                <a href="edit_package.php?id=' . $package['id'] . '" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="delete_package.php?id=' . $package['id'] . '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Are you sure you want to delete this package?\')">Delete</a>
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
