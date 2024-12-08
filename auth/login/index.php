<?php
session_start();

require '../../connection/connection.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if ($user) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['firstname'];
      $_SESSION['role'] = $user['role'];

      header("Location: ../../home/");
      exit();
    } else {
      $error_message = "Invalid password. Please try again.";
    }
  } else {
    $error_message = "No account found with this email.";
  }

  $stmt = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css">
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
      <form class="login-form" method="POST">
        <h2>Sign In</h2>

        <?php if ($error_message): ?>
          <div class="alert alert-danger">
            <?php echo $error_message; ?>
          </div>
        <?php endif; ?>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>

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
          <a href="../../home/" class="back-to-homepage">Back to Homepage</a>
        </div>

      </form>
    </div>
  </div>


  <script>
    function redirectToSignUp() {
      window.location.href = "../register/";
    }

    function redirectToHomepage() {
      window.location.href = "../../home/";
    }
  </script>
</body>
</html>