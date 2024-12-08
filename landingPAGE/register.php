<?php 

include 'connect.php';

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];

        if ($email === 'admin@gmail.com' && $password === md5('admin123')) {
            header("Location: /capstone/admin/admin.php");
        } else {
            header("Location: user.php");
        }
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
