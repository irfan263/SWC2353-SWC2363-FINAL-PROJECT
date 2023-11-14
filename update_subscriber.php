<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "podcasterk_feedback");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update the subscriber's information in the database
    $query = "UPDATE subscribers SET username = ?, email = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssi", $username, $email, $id);

    if ($stmt->execute()) {
        echo "Subscriber information updated successfully.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
<a href="admin_dashboard.php" style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">OK</a>