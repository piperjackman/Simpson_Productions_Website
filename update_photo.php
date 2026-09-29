<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$json_file = "photos.json";
$data = json_decode(file_get_contents($json_file), true);

$index = $_POST["index"];

// Update text fields
$data[$index]["show"] = $_POST["show"];
$data[$index]["name"] = $_POST["name"];
$data[$index]["date"] = $_POST["date"];

// Handle optional image replacement
if (!empty($_FILES["photo"]["name"])) {
    $target_dir = "images/show_photos/";
    $new_file = $target_dir . basename($_FILES["photo"]["name"]);

    // Delete old file
    if (file_exists($data[$index]["image"])) {
        unlink($data[$index]["image"]);
    }

    // Save new file
    move_uploaded_file($_FILES["photo"]["tmp_name"], $new_file);

    // Update JSON entry
    $data[$index]["image"] = $new_file;
}

// Save updated JSON
file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));

// Redirect back to admin panel
header("Location: admin_panel.php");
exit();
?>