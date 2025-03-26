<?php
session_start();
session_destroy();
// Expire the cookies
setcookie("user_id", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
header("Location: ../index.php");
exit();
?>
