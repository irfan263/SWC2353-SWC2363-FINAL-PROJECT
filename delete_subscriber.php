<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "podcasterk_feedback");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    
    $query = "DELETE FROM subscribers WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Subscriber has been deleted.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}

$mysqli->close();
?>

<br><br>
<a href="admin_dashboard.php" style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">OK</a>