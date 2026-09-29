<?php
session_start();

// Simple password 
$correct_password = "simpson123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["password"];

    if ($password === $correct_password) {
        $_SESSION["logged_in"] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = "Incorrect password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="/capstone/main.css">
</head>
<body>

<div class="admin-login-container">
  <h2>Admin Login</h2>

  <form method="POST" action="admin_login.php">
    <input type="password" name="password" placeholder="Enter password" required>
    <button type="submit">Login</button>
  </form>
</div>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

</body>
</html>