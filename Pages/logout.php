<?php
session_start();
session_destroy();

// Expire all authentication-related cookies
setcookie("user_id", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("user_email", "", time() - 3600, "/"); // Expire Remember Me email cookie
setcookie("user_pass", "", time() - 3600, "/");  // Expire Remember Me password cookie

header("Location: ../index.php");
exit();
?>
