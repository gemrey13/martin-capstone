<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Post</title>
</head>
<body>
    <h2>Post an Update</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="postTitle">Title:</label><br>
        <input type="text" id="postTitle" name="title" required><br><br>

        <label for="postText">Text:</label><br>
        <textarea id="postText" name="text" rows="5" cols="50" required></textarea><br><br>

        <label for="postImage">Select Image to Upload:</label><br>
        <input type="file" name="image" id="postImage" accept="image/*" required><br><br>

        <input type="submit" value="Post">
    </form>
</body>
</html>


<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect post data
    $title = $_POST['title'];
    $text = $_POST['text'];
    
    // Directory where images will be saved
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate image upload
    if (isset($_FILES["image"])) {
        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check if file already exists
            if (!file_exists($target_file)) {
                // Check file size (5MB limit)
                if ($_FILES["image"]["size"] <= 5000000) {
                    // Only allow certain file formats
                    if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                        // Move file to the uploads directory
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            // Now you can save $title, $text, and $target_file (image path) to the database
                            // Example SQL query (assuming you have a table named 'posts'):
                            /*
                            $conn = new mysqli("hostname", "username", "password", "database");
                            $stmt = $conn->prepare("INSERT INTO posts (title, text, image) VALUES (?, ?, ?)");
                            $stmt->bind_param("sss", $title, $text, $target_file);
                            $stmt->execute();
                            $stmt->close();
                            $conn->close();
                            */
                            echo "Post uploaded successfully!";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                } else {
                    echo "Sorry, your file is too large.";
                }
            } else {
                echo "File already exists.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
