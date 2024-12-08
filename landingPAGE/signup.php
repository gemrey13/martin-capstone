<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "capstone"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Account created successfully!";
        header("Location: login.php"); // Redirect to login page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f4f4f4;
    }
    
    .container {
      display: flex;
      width: 80%;
      max-width: 1000px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      overflow: hidden;
    }
    
    .left-section {
      flex: 1;
      background-color: #1E88E5;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    
    .left-section .logo {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .left-section .logo img {
      height: 300px;
      width: 300px;
      margin-bottom: 20px;
    }
    
    .left-section h1 {
      font-size: 2rem;
      font-weight: bold;
    }
    
    .right-section {
      flex: 1;
      padding: 40px;
    }
    
    .signup-form {
      width: 100%;
    }
    
    .signup-form h2 {
      margin-bottom: 20px;
      color: #333;
    }
    
    .signup-form label {
      font-size: 0.9rem;
      margin-bottom: 5px;
      display: block;
      color: #555;
    }
    
    .signup-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .button-container {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }
    
    .button-container .signup-btn {
      flex: 1;
      padding: 10px;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      background-color: #43A047;
      color: white;
      cursor: pointer;
    }
    
    .button-container .signup-btn:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Section -->
    <div class="left-section">
      <div class="logo">
        <img src="../landingPAGE/LYDO-logo.png" alt="LYDO Logo">
        <h1>#LYDO Kami</h1>
      </div>
    </div>
    
    <!-- Right Section -->
    <div class="right-section">
      <form class="signup-form" action="signup.php" method="POST">
        <h2>Create an Account</h2>
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
        <!-- Login Link -->
        <p class="signup-link">
                Already have an account? <a href="login.php">Login Now</a>
            </p>
      </form>
    </div>
  </div>
</body>
</html>
