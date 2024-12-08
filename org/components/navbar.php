<?php
require '../../connection/connection.php';

$user_id = $_SESSION['user_id'];  // Assuming the user ID is stored in the session
$query = "SELECT firstname, lastname FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user) {
    $first_name = $user['firstname'];
    $last_name = $user['lastname'];
} else {
    $first_name = "Unknown";
    $last_name = "User";
}
?>




<header>
    <h1>
        <label for="nav-toogle">
            <span class="las la-bars"></span>
        </label>
        Organization Name
    </h1>


    <div class="user-wrapper">
        <img src="../../assets/images/avatar.jpg" width="40px" height="40px" alt="">
        <div>
            <h4><?= htmlspecialchars($first_name . ' ' . $last_name); ?></h4>
            <small>User</small>
            <a href="../../auth/logout.php">
                <span class="material-symbols-sharp"></span>
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>