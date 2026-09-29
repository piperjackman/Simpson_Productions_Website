<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

// Load JSON data
$json_file = "photos.json";
$data = json_decode(file_get_contents($json_file), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/capstone/main.css">
</head>

<body>

<div class="admin-panel-container">

    <h1 class="admin-title">Admin Panel</h1>

    <!-- Upload Box -->
    <div class="admin-upload-box">
        <h2>Upload New Photo</h2>

        <form action="upload_photo.php" method="POST" enctype="multipart/form-data">

            <label>Show Name:</label>
            <input type="text" name="show" required>

            <label>Performer Name(s):</label>
            <input type="text" name="name" required>

            <label>Date (YYYY-MM-DD):</label>
            <input type="date" name="date" required>

            <label>Upload Photo:</label>
            <input type="file" name="photo" accept="image/*" required>

            <button type="submit">Upload Photo</button>
        </form>
    </div>

    <!-- Existing Photos -->
    <h2>Existing Photos</h2>

    <ul class="admin-photo-list">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $index => $photo): ?>
                <li>
                    <img src="<?php echo $photo['image']; ?>" width="80">

                    <div class="admin-photo-info">
                        <strong><?php echo $photo['show']; ?></strong><br>
                        <?php echo $photo['name']; ?><br>
                        <?php echo $photo['date']; ?>
                    </div>

                    <div class="admin-photo-actions">
                        <!-- Edit Button -->
                        <form action="edit_photo.php" method="GET">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit" class="edit-btn">Edit</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="delete_photo.php" method="POST">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No photos uploaded yet.</p>
        <?php endif; ?>
    </ul>

</div>

</body>
</html>