<!DOCTYPE html>
<html>
<head>
    <title>Feedback Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            color: blue;
        }
        .message {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
        }
        .success {
            background-color: #5cb85c;
            color: #fff;
        }
        .error {
            background-color: #d9534f;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Feedback Result</h2>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            $mysqli = new mysqli("localhost", "root", "", "podcasterk_feedback");

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

            if ($mysqli->query($sql) === TRUE) {
                echo '<div class="message success">Thank you for your feedback! We will get back to you soon.</div>';
            } else {
                echo '<div class="message error">Oops! Something went wrong. Please try again later.</div>';
            }

            $mysqli->close();
        }
        ?>
    </div>
</body>
</html>

<br><br>

<a href="index.html" style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">OK</a>
