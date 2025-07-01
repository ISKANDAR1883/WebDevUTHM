<?php
// --- Database Connection ---
$servername = "localhost";
$username = "root"; // change if needed
$password = "";     // change if needed
$dbname = "lab_7"; // change this to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// --- Check connection ---
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Get and sanitize form data ---
$matric = $_POST['matric'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure hash
$role = $_POST['role'];

// --- Insert data into users table ---
$sql = "INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $matric, $name, $password, $role);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
