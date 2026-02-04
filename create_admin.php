<?php
/**
 * Create Admin Script
 * Run this file ONCE to create admin account with correct password
 * After running, DELETE this file for security
 */


require "includes/db.php";


// Admin credentials
$username = "admin";
$password = "admin123";  // Plain text password
$full_name = "System Administrator";
$email = "admin@system.com";


// Hash the password properly
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Delete existing admin if exists
$delete_sql = "DELETE FROM admins WHERE username = ?";
$stmt = $conn->prepare($delete_sql);
$stmt->bind_param("s", $username);
$stmt->execute();


// Insert new admin
$insert_sql = "INSERT INTO admins (username, password, full_name, email) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insert_sql);
$stmt->bind_param("ssss", $username, $hashed_password, $full_name, $email);


if ($stmt->execute()) {
    echo "<h2>✅ Admin Account Created Successfully!</h2>";
    echo "<p><strong>Username:</strong> admin</p>";
    echo "<p><strong>Password:</strong> admin123</p>";
    echo "<hr>";
    echo "<p style='color: red; font-weight: bold;'>⚠️ IMPORTANT: DELETE THIS FILE (create_admin.php) NOW FOR SECURITY!</p>";
    echo "<p><a href='admin_login.php'>Go to Admin Login</a></p>";
} else {
    echo "<h2>❌ Error Creating Admin</h2>";
    echo "<p>" . $stmt->error . "</p>";
}


$conn->close();
?>