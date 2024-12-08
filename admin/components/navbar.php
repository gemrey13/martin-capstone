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
        Admin
    </h1>


    <div class="user-wrapper">
        <div class="notif">
            <i class="bx bx-bell bell-icon" onclick="toggleNotifications()"></i>
            <div id="notificationDropdown" class="notification-dropdown">
                <h4>Notifications</h4>
                <div class="notification-options">
                    <span>See all notificatios</span>
                    <span>Mark all as read</span>
                </div>
                <div class="notification-list">
                    <div class="customer">
                        <div class="info">
                            <img src="/capstone/assets/images/avatar.jpg" width="40px" height="40px" alt="">
                            <div>
                                <h4>Rotaract Club Lucena</h4>
                                <small>Community-Based Organization</small>
                            </div>
                        </div>
                        <div>
                            <form action="approved.php" method="post" style="display:inline;">
                                <input type="hidden" name="organization_id" value="1"> 
                                <button type="submit" name="action" value="accept">accept</button>
                            </form>
                            <form action="declined.php" method="post" style="display:inline;">
                                <input type="hidden" name="organization_id" value="1"> 
                                <button type="submit" name="action" value="decline">decline</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="message">
            <i class="bx bx-envelope message-icon" onclick="toggleMessages()"></i>
            <div id="messageDropdown" class="message-dropdown">
                <h4>Messages</h4>
                <div class="message-options">
                    <span>See all messages</span>
                    <span>Mark all as read</span>
                </div>
                <div class="message-list">
                    <!-- Add message items here -->
                    <div class="message-item">
                        <p>Message 1</p>
                        <small>10 mins ago</small>
                    </div>
                    <div class="message-item">
                        <p>Message 2</p>
                        <small>30 mins ago</small>
                    </div>
                </div>
            </div>
        </div>

        <img src="/capstone/assets/images/avatar.jpg" width="40px" height="40px" alt="">
        <div>
            <h4><?= htmlspecialchars($first_name . ' ' . $last_name); ?></h4>
            <small>Admin</small>
            <a href="../../auth/logout.php">
                <span class="material-symbols-sharp"></span>
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>