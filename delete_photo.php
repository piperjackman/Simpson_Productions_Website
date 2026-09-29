<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$json_file = "photos.json";
$data = json_decode(file_get_contents($json_file), true);

// Get the index of the photo to delete
$index = $_POST["index"];

// Delete the image file
$imagePath = $data[$index]["image"];
if (file_exists($imagePath)) {
    unlink($imagePath);
}

// Remove the entry from the array
array_splice($data, $index, 1);

// Save updated JSON
file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));

// Redirect back to admin panel
header("Location: admin_panel.php");
exit();
?>