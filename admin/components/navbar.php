<header>
    <h1>
        <label for="nav-toogle">
            <span class="las la-bars"></span>
        </label>
        Admin
    </h1>


    <div class="user-wrapper">
        <div class="notif">
            <!-- Notification Bell Icon with Clickable Dropdown -->
            <i class="bx bx-bell bell-icon" onclick="toggleNotifications()"></i>
            <div id="notificationDropdown" class="notification-dropdown">
                <h4>Notifications</h4>
                <div class="notification-options">
                    <span>See all notificatios</span>
                    <span>Mark all as read</span>
                </div>
                <div class="notification-list">
                    <!-- Add notification items here -->
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
                                <input type="hidden" name="organization_id" value="1"> <!-- You can change the value as needed -->
                                <button type="submit" name="action" value="accept">accept</button>
                            </form>
                            <form action="declined.php" method="post" style="display:inline;">
                                <input type="hidden" name="organization_id" value="1"> <!-- You can change the value as needed -->
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
                    <!-- Add more message items as needed -->
                </div>
            </div>
        </div>

        <img src="/capstone/assets/images/avatar.jpg" width="40px" height="40px" alt="">
        <div>
            <h4>Elaine Manalo</h4>
            <small>Admin</small>
            <a href="../../auth/logout.php">
                <span class="material-symbols-sharp"></span>
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>