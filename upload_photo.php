<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

// Folder where photos will be stored
$target_dir = "images/show_photos/";

// Make sure folder exists
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Save uploaded file
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

// Read existing JSON
$json_file = "photos.json";
$data = json_decode(file_get_contents($json_file), true);

// Create new entry
$new_entry = [
    "show" => $_POST["show"],
    "name" => $_POST["name"],
    "date" => $_POST["date"],
    "image" => $target_file
];

// Add to array
$data[] = $new_entry;

// Save back to JSON
file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));

// Redirect back to admin panel
header("Location: admin_panel.php");
exit();
?>