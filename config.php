<?php
session_start();

$host = 'localhost';
$dbname = 'Travel_inspire_hub';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Helper function to redirect
function redirect($url) {
    header("Location: $url");
    exit;
}
?>