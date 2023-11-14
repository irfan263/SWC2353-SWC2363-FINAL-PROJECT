<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>

    <?php
    session_start();

    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
        echo "<p>Welcome, Admin!</p>";
        echo "<button><a href='view_subscribers.php'>View Subscribers</a></button><br><br>";
        echo "<button><a href='add_subscriber.html'>Add Subscriber</a></button><br><br>";
        echo "<button><a href='update_subscriber.html'>Update Subscriber</a></button><br><br>";
        echo "<button><a href='delete_subscriber.html'>Delete Subscriber</a></button><br><br>";
        echo "<button><a href='search_subscriber.html'>Search for Subscriber</a></button><br><br>";
        echo "<button><a href='logout.php'>Logout</a></button><br><br>";
    } else {
        header("Location: admin_login.html");
    }
    ?>

</body>
</html>
