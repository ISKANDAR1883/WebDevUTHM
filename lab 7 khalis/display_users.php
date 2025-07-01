<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_7";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        a.button {
            padding: 4px 10px;
            background-color: #4287f5;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button.delete {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">User List</h2>
<table>
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $matric = htmlspecialchars($row["matric"]);
            echo "<tr>";
            echo "<td>$matric</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["role"]) . "</td>";
            echo "<td>
                    <a href='update_user.php?matric=$matric' class='button'>Update</a>
                    <a href='delete_user.php?matric=$matric' class='button delete' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No users found</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
