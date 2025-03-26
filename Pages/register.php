<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Encrypt password

    // Check if the email is already registered
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Email already registered! <a href='login.html'>Login here</a>";
    } else {
        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        
        if ($stmt->execute()) {
            $_SESSION["user_id"] = $stmt->insert_id;
            $_SESSION["username"] = $username;
            header("Location: ../index.php"); // Redirect to homepage
            exit();
        } else {
            echo "Registration failed. Try again.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Life Below Water</title>
    <link rel="stylesheet" href="../styles.css"/>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <!--<a href="about.html">About</a>-->
        <a href="contact.html">Contact</a>
    </div>

    <div class="login-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label>User Name:</label>
            <input type="text" name="username" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Register</button>

        </form>
        
    </div>
</body>
</html>

