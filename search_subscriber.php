<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "podcasterk_feedback");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['search_keyword'])) {
    $search_keyword = $_POST['search_keyword'];

    // Search for the subscriber in the database based on the search keyword
    $query = "SELECT * FROM subscribers WHERE username LIKE ? OR email LIKE ?";
    $stmt = $mysqli->prepare($query);

    // Use "%" to perform a partial search
    $search_pattern = "%" . $search_keyword . "%";
    $stmt->bind_param("ss", $search_pattern, $search_pattern);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }

    $stmt->close();
}

$mysqli->close();
?>

<br><br>
<a href="admin_dashboard.php" style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">OK</a>
