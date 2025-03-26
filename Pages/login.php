// PHP part for the login section

<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user["password"])) {
            // Login successful, create session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            
            // Redirect to dashboard
            header("Location: ../index.php");
            exit();
        } else {
            echo "Invalid password! <a href='login.php'>Try again</a>";
        }
    } else {
        echo "User not found! <a href='register.php'>Register here</a>";
    }

    $stmt->close();
}
?>
//HTML part below

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Life Below Water</title>
    <link rel="stylesheet" href="../styles.css"/>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <!--<a href="about.php">About</a>-->
        <a href="contact.php">Contact</a>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <form>
            <label>Email:</label>
            <input type="email" required>
            <label>Password:</label>
            <input type="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
