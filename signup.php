<!DOCTYPE html>
<html>
<head>
    <title>Signup Result</title>
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
        <h2>Signup Result</h2>
        
        <?php
        $mysqli = new mysqli("localhost", "root", "", "podcasterk_feedback");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Check if the username or email already exist
            $check_query = "SELECT * FROM subscribers WHERE username = '$username' OR email = '$email'";
            $check_result = $mysqli->query($check_query);

            if ($check_result->num_rows > 0) {
                echo '<div class="message error">Username or email already exists. Please choose a different one.</div>';
            } else {
                // Insert the new user into the database
                $insert_query = "INSERT INTO subscribers (username, email, password) VALUES ('$username', '$email', '$password')";
                if ($mysqli->query($insert_query) === TRUE) {
                    echo '<div class="message success">Signup successful! Congratulations, you are now one of us.</div>';
                } else {
                    echo '<div class="message error">Error: ' . $mysqli->error . '</div>';
                }
            }
        }

        $mysqli->close();
        ?>
    </div>
</body>
</html>


<br><br>

<a href="index.html" style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">OK</a>
