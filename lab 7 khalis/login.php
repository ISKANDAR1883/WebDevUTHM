<?php
// --- Database Connection ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_7";

$conn = new mysqli($servername, $username, $password, $dbname);

// --- Check Connection ---
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Get login form data ---
$matric = $_POST['matric'];
$password_input = $_POST['password'];

// --- Retrieve user from DB ---
$sql = "SELECT * FROM users WHERE matric = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matric);
$stmt->execute();
$result = $stmt->get_result();

// --- Check if user exists ---
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // --- Verify password ---
    if (password_verify($password_input, $row['password'])) {
        // Successful login
        session_start();
        $_SESSION['matric'] = $row['matric'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];

        // Redirect to dashboard or user page (e.g., Question 5 page)
        header("Location: display_users.php"); // change if needed
        exit();
    } else {
        // Wrong password
        echo "Invalid matric or password.";
    }
} else {
    // No such user
    echo "Invalid matric or password.";
}

$stmt->close();
$conn->close();
?>
