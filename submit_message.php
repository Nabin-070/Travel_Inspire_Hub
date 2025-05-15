<?php
include 'config.php'; // make sure this includes your PDO connection as $pdo

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $service = $_POST['service'] ?? '';
    $message = $_POST['message'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, phone, service, message) 
                               VALUES (:name, :email, :phone, :service, :message)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':service' => $service,
            ':message' => $message
        ]);

        echo "<script>alert('Message sent successfully!'); window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "Error saving message: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
