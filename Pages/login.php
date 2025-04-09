<!-- PHP part for the login section -->
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
            $_SESSION["role"] = $user["role"]; // Save role in session

            // Handle "Remember Me" functionality
            if (!empty($_POST["remember"])) {
                setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
                setcookie("user_pass", $password, time() + (86400 * 30), "/"); // 30 days
            } else {
                setcookie("user_email", "", time() - 3600, "/");
                setcookie("user_pass", "", time() - 3600, "/");
            }

            // Redirect based on role
            if ($user["role"] === "admin") {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else { 
            echo "<script>alert('Invalid password! Please try again.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('User not found! Please register first.'); window.location.href='register.php';</script>";
        exit();
    }

    $stmt->close();
}
?>

<!-- HTML part below -->

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
        <form action="login.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Password:</label>
        <input type="password" name="password" required>

        <label>
            <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_email"])) { echo "checked"; } ?>> Remember Me
        </label>

        <p style="margin-top: 10px;">
            Haven't registered?  
            <a href="../pages/register.php" style="color: #0077b6; text-decoration: none;">Register Now</a>
        </p>

    <button type="submit">Login</button>
</form>

    </div>
</body>
</html>
