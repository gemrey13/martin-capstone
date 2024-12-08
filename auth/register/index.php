<?php
session_start();
require '../../connection/connection.php';  // Ensure this path is correct

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if email already exists
    $checkEmailQuery = "SELECT id FROM users WHERE email = ?";
    $stmt = $pdo->prepare($checkEmailQuery);  // Use $pdo here for PDO connection
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // If email already exists
        $error_message = "Email is already in use. Please use another email.";
    } else {
        // Hash password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $sql = "INSERT INTO users (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, 'youth')";
        $stmt = $pdo->prepare($sql);  // Use $pdo here for PDO connection
        $stmt->bindParam(1, $firstname, PDO::PARAM_STR);
        $stmt->bindParam(2, $lastname, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $hashedPassword, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            header("Location: ../login/");
            exit();
        } else {
            // Error occurred during registration
            $error_message = "Failed to create account. Please try again.";
        }
    }

    $stmt = null;  // Close the prepared statement
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  <div class="container">
    <div class="left-section">
      <div class="logo">
        <img src="../../assets/images/LYDO-logo.png" alt="LYDO Logo">
        <h1>#LYDO Kami</h1>
      </div>
    </div>

    <div class="right-section">
      <form class="signup-form" method="POST">
        <h2>Create an Account</h2>

        <?php if ($error_message): ?>
          <div class="alert alert-danger">
            <?php echo $error_message; ?>
          </div>
        <?php endif; ?>

        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>

        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" 
               placeholder="Create a password" 
               pattern="(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*]{8,}" 
               title="Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character (!@#$%^&*)." 
               required>

        <div class="button-container">
          <button type="submit" class="signup-btn">Sign Up</button>
        </div>
        <p class="signup-link">
          Already have an account? <a href="../login/">Login Now</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
