<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$json_file = "photos.json";
$data = json_decode(file_get_contents($json_file), true);

$index = $_GET["index"];
$photo = $data[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Photo</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

<div class="admin-panel-container">

    <h1 class="admin-title">Edit Photo</h1>

    <div class="admin-upload-box">
        <form action="update_photo.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="index" value="<?php echo $index; ?>">

            <label>Show Name:</label>
            <input type="text" name="show" value="<?php echo $photo['show']; ?>" required>

            <label>Performer Name(s):</label>
            <input type="text" name="name" value="<?php echo $photo['name']; ?>" required>

            <label>Date (YYYY-MM-DD):</label>
            <input type="date" name="date" value="<?php echo $photo['date']; ?>" required>

            <p>Current Image:</p>
            <img src="<?php echo $photo['image']; ?>" class="admin-edit-image">

            <label>Replace Image (optional):</label>
            <input type="file" name="photo" accept="image/*">

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <a href="admin_panel.php" class="admin-back-link">← Back to Admin Panel</a>

</div>

</body>
</html>