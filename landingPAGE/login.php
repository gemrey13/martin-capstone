<?php
session_start();

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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Query to find the user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['firstname'];

            // Redirect to dashboard or desired page
            header("Location: homepage.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        $error_message = "No account found with this email.";
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
  <title>Login Page</title>
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
    
    display: flex; /* Use Flexbox for centering */
    flex-direction: column; /* Ensure children stack vertically */
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    }

    .left-section .logo img {
        height: 300px; /* Set the height to 300px */
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
    
    .login-form {
    width: 100%;
    }
    
    .login-form h2 {
    margin-bottom: 20px;
    color: #333;
    }
    
    .login-form label {
    font-size: 0.9rem;
    margin-bottom: 5px;
    display: block;
    color: #555;
    }
    
    .login-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }
    
    .actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    }
    
    .actions .forgot-password {
    color: #1E88E5;
    text-decoration: none;
    }
    
    .actions .forgot-password:hover {
    text-decoration: underline;
    }
    
    .button-container {
    display: flex; /* Use Flexbox to align items in a row */
    justify-content: space-between; /* Add space between the buttons */
    gap: 10px; /* Add some space between the buttons */
    }

    .button-container .login-btn,
    .button-container .signup-btn {
    flex: 1; /* Make both buttons equal in width */
    padding: 10px; /* Add padding for consistent size */
    font-size: 1rem; /* Ensure font size consistency */
    border: none; /* Remove borders for a clean look */
    border-radius: 5px; /* Add rounded corners */
    cursor: pointer;
    }

    .button-container .login-btn {
    background-color: #1E88E5; /* Blue for Login */
    color: white;
    }

    .button-container .signup-btn {
    background-color: #43A047; /* Green for Sign Up */
    color: white;
    }

    .button-container .login-btn:hover,
    .button-container .signup-btn:hover {
    opacity: 0.9; /* Slight hover effect */
    }

    .actions {
    display: flex; /* Enable flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    margin-top: 20px; /* Adds some space above the link */
    height: 50px; /* Set a height for centering */
    }

    .actions .back-to-homepage {
    color: #1E88E5; /* Blue color for the link */
    text-decoration: none; /* Remove underline from link */
    font-size: 1rem; /* Adjust font size */
    }

    .actions .back-to-homepage:hover {
    text-decoration: underline; /* Underline on hover */
    color: #1565C0; /* Darker blue on hover */
    }

    .actions-forgot {
    display: flex; /* Enable flexbox */
    justify-content: flex-end; /* Align content to the right */
    margin-top: 5px; /* Adds some space above the link */
    }

    .actions-forgot .forgot-password {
    color: #1E88E5; /* Blue color for the link */
    text-decoration: none; /* Remove underline from link */
    font-size: 0.9rem; /* Slightly smaller font size */
    }

    .actions-forgot .forgot-password:hover {
    text-decoration: underline; /* Underline on hover */
    color: #1565C0; /* Darker blue on hover */
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
      <form class="login-form" action="login.php" method="POST">
        <h2>Sign In</h2>
        <label for="username">Username</label>
        <input type="text" name="email" id="username" placeholder="Enter your username" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <div class="actions-forgot">
          <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
        <br>
        <br>
        <div class="button-container">
            <button type="submit" class="login-btn">Login</button>
            <button type="button" class="signup-btn" onclick="redirectToSignUp()">Sign Up</button>
        </div>
        <div class="actions">
            <a href="landing.php" class="back-to-homepage">Back to Homepage</a>
        </div>

      </form>
    </div>
  </div>
  
  
    <script>
    function redirectToSignUp() {
        window.location.href = "signup.php"; // Replace with your sign-up page link
        }
    </script>

    <script>
    function redirectToHomepage() {
        window.location.href = "landing.php"; // Redirects to landingpage.php
    }
    </script>


</body>
</html>