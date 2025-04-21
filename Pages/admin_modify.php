<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Admin</title>
    <link rel="stylesheet" href="../styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../images/background.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 15px;
            background: transparent;
        }

        .nav a, .nav span {
            font-size: 18px;
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            transition: 0.3s;
        }

        .nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .modify-container {
            margin-top: 120px;
            text-align: center;
        }

        .modify-btn {
            display: inline-block;
            width: 220px;
            height: 100px;
            margin: 20px;
            font-size: 24px;
            font-weight: bold;
            background-color: #00c8ff;
            border: none;
            border-radius: 10px;
            color: white;
            transition: 0.3s;
        }

        .modify-btn:hover {
            background-color: #0077b6;
        }

        .footer {
            margin-top: auto;
            padding: 20px;
            text-align: center;
            background: transparent;
        }
    </style>
</head>
<body>
    <div class="nav">
        <?php if (isset($_SESSION["username"])): ?>
            <span>Welcome, <?php echo $_SESSION["username"]; ?>!</span>
            <a href="./logout.php">Logout</a>
        <?php else: ?>
            <a href="./login.php">Login/Register</a>
        <?php endif; ?>
        <a href="./admin_dashboard.php">Dashboard</a>
    </div>

    <div class="modify-container">
        <h1>Admin Modifications</h1>
        <a href="./admin_users.php">
            <button class="modify-btn">Users</button>
        </a>
        <a href="./admin_submissions.php">
            <button class="modify-btn">Submissions</button>
        </a>
    </div>

    <footer class="footer">
        <p>© 2025 Life Below Water, Inc</p>
    </footer>
</body>
</html>
