<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Life Below Water</title>
    <link rel="stylesheet" href="../styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../images/background.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 1000;
        }
        .nav a {
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
        .contact-container {
            width: 90%;
            max-width: 600px;
            margin-top: 100px;
            padding: 30px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            backdrop-filter: blur(5px);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
        }
        .contact-container h1 {
            color: #3498db;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #3498db;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
        }
        .form-group textarea {
            height: 150px;
            resize: vertical;
        }
        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-btn:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <a href="awareness.php">Awareness</a>
    </div>

    <div class="contact-container">
        <h1>Contact Us</h1>
        <form action="process_contact.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</body>
</html> 