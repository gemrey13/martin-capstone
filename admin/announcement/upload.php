<?php
session_start();
require '../../connection/connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];  
    $title = $_POST['title'];
    $text = $_POST['text'];
    $orgName = $_POST['orgName'];

    $safeOrgName = preg_replace("/[^a-zA-Z0-9]+/", "", $orgName); 
    $uploadDir = dirname(__DIR__) . '/posts/' . $safeOrgName . '/';  

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    function uploadFile($file, $uploadDir) {
        $targetFile = $uploadDir . uniqid() . '-' . basename($file["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $validTypes = ["jpg", "jpeg", "png", "pdf", "docx"];
        if (!in_array($fileType, $validTypes)) {
            die("Invalid file type.");
        }

        if (file_exists($targetFile)) {
            die("File already exists.");
        }

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;  
        } else {
            die("Error uploading file.");
        }
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Upload the image
        $imagePath = uploadFile($_FILES['image'], $uploadDir);

        try {
            $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, text, image) VALUES (:user_id, :title, :text, :image)");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':text', $text, PDO::PARAM_STR);
            $stmt->bindParam(':image', $imagePath, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                header("Location: ./?message=Post successfully uploaded");
                exit();
            } else {
                echo "Error: Could not upload post.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: No image uploaded or there was an issue with the image.";
    }
} else {
    echo "Invalid request method.";
}
?>
