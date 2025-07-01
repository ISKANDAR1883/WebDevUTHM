<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_7";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);

    if ($stmt->execute()) {
        header("Location: display_users.php");
        exit();
    } else {
        echo "Delete failed.";
    }
}
?>
