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
        echo "Email already registered! <a href='login.php'>Login here</a>";
    } else {
        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        
        if ($stmt->execute()) {
            $_SESSION["user_id"] = $stmt->insert_id;
            $_SESSION["username"] = $username;

            // Handle "Remember Me" functionality
            if (!empty($_POST["remember"])) {
                setcookie("user_email", $email, time() + (86400 * 30), "/"); // Store for 30 days
                setcookie("user_pass", $_POST["password"], time() + (86400 * 30), "/"); // Store for 30 days (raw password)
            } else {
                // Delete cookies if "Remember Me" is unchecked
                setcookie("user_email", "", time() - 3600, "/");
                setcookie("user_pass", "", time() - 3600, "/");
            }

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
        <a href="contact.php">Contact</a>
    </div>

    <div class="login-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label>User Name:</label>
            <input type="text" name="username" required>
            
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo isset($_COOKIE["user_email"]) ? $_COOKIE["user_email"] : ''; ?>" required>
            
            <label>Password:</label>
            <input type="password" name="password" value="<?php echo isset($_COOKIE["user_pass"]) ? $_COOKIE["user_pass"] : ''; ?>" required>

            <label>
                <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_email"])) { echo "checked"; } ?>> Remember Me
            </label>
            <p style="margin-top: 10px;">
            Already Registered? 
            <a href="../pages/login.php" style="color: #0077b6; text-decoration: none;">Login</a>
        </p>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
