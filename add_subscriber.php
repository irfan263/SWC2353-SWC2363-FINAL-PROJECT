<?php
$mysqli = new mysqli("localhost", "root", "", "podcasterk_feedback");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert the new subscriber into the database
    $query = "INSERT INTO subscribers (username, email, password) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Subscriber added successfully.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
<a href="admin_dashboard.php" style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">OK</a>