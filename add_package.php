<?php
session_start();
include '../config.php';

// Check admin authentication
if (!isset($_SESSION['user_id']) || $_SESSION['user_email'] !== 'admin@example.com') {
    header("Location: ../login.php");
    exit();
}

$package = ['name' => '', 'description' => '', 'price' => '', 'duration' => '', 'image_url' => ''];
$isEdit = false;

// Handle edit case
if (isset($_GET['id'])) {
    $isEdit = true;
    $stmt = $pdo->prepare("SELECT * FROM packages WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $package = $stmt->fetch();
    
    if (!$package) {
        header("Location: manage_packages.php");
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    
    // Handle image upload
    $image_url = $package['image_url'] ?? 'default-package.jpg';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
        // Generate unique filename
        $ext = pathinfo($target_file, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        $target_file = $target_dir . $filename;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_url = 'uploads/' . $filename;
            
            // Delete old image if it exists and isn't the default
            if ($isEdit && $package['image_url'] && $package['image_url'] !== 'default-package.jpg') {
                @unlink('../' . $package['image_url']);
            }
        }
    }
    
    try {
        if ($isEdit) {
            $stmt = $pdo->prepare("UPDATE packages SET name = ?, description = ?, price = ?, duration = ?, image_url = ? WHERE id = ?");
            $stmt->execute([$name, $description, $price, $duration, $image_url, $_GET['id']]);
            $success = "Package updated successfully";
        } else {
            $stmt = $pdo->prepare("INSERT INTO packages (name, description, price, duration, image_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $description, $price, $duration, $image_url]);
            $success = "Package added successfully";
        }
        
        header("Location: manage_packages.php?success=" . urlencode($success));
        exit();
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<!-- Use the same header/sidebar as dashboard.php -->

<div class="main-content">
    <div class="container-fluid">
        <h2 class="mb-4"><?= $isEdit ? 'Edit Package' : 'Add New Package' ?></h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Package Name</label>
                            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($package['name']) ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" class="form-control" name="price" step="0.01" min="0" value="<?= htmlspecialchars($package['price']) ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Duration (days)</label>
                            <input type="number" class="form-control" name="duration" min="1" value="<?= htmlspecialchars($package['duration']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="5" required><?= htmlspecialchars($package['description']) ?></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Package Image</label>
                        <?php if ($package['image_url']): ?>
                            <div class="mb-2">
                                <img src="../<?= htmlspecialchars($package['image_url']) ?>" alt="Current image" style="max-height: 150px; border-radius: 5px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Leave blank to keep current image</small>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <a href="manage_packages.php" class="btn btn-outline-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update Package' : 'Add Package' ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include footer/scripts from dashboard -->