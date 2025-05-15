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
    <title>Manage Users | TravelEase Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container my-5">
    <h2 class="mb-4">Manage Users</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
                while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $role = ucfirst($user['role'] ?? 'user');
                    $roleBadge = ($role === 'Admin') ? 'bg-success' : 'bg-secondary';

                    echo '<tr>
                            <td>' . $user['id'] . '</td>
                            <td>' . htmlspecialchars($user['username'] ?? 'N/A') . '</td>
                            <td>' . htmlspecialchars($user['email'] ?? 'N/A') . '</td>
                            <td>' . htmlspecialchars($user['full_name'] ?? 'N/A') . '</td>
                            <td><span class="badge ' . $roleBadge . '">' . $role . '</span></td>
                            <td>' . date('M j, Y', strtotime($user['created_at'])) . '</td>
                            <td>
                                <a href="edit_user.php?id=' . $user['id'] . '" class="btn btn-sm btn-outline-warning">Edit</a>
                                <a href="delete_user.php?id=' . $user['id'] . '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</a>
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
