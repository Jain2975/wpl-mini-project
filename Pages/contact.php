<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Validation checks
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit;
    }

    if (str_word_count($message) > 50) {
        echo "<script>alert('Message cannot exceed 50 words!'); window.history.back();</script>";
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Form submitted successfully!'); window.location.href = '../index.php';</script>";
    } else {
        echo "<script>alert('Error submitting form. Please try again later.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Life Below Water</title>
    <link rel="stylesheet" href="../styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="nav">
        <a href="../index.php">Home</a>
        <a href="login.php">Login</a>
    </div>

    <section class="contact-container">
        <h1>Contact Us</h1>

        <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Message:</label>
            <textarea name="message" id="message" required></textarea>
            <p id="wordCount">0/50 words</p>

            <button type="submit">Send</button>
        </form>
    </section>

    <script>
        document.getElementById("message").addEventListener("input", function() {
            const words = this.value.trim().split(/\s+/);
            const wordCount = words.filter(word => word.length > 0).length;

            if (wordCount > 50) {
                this.value = words.slice(0, 50).join(" ");
            }

            document.getElementById("wordCount").textContent = `${Math.min(wordCount, 50)}/50 words`;
        });
    </script>

</body>
</html>
