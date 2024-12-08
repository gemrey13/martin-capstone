<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

    <div class="main-content">
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
                    <!-- Message Icon with Clickable Dropdown -->
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
                    <a href="/capstone/landing.php">
                        <span class="material-symbols-sharp"></span>
                        <span>Logout</span>
                    </a>
                </div>
            </div>

           


        </header>

        <main>
        <div class="cards">
            <!-- Approved Organization Section -->
            <div class="card-single">
                <a href="orglist.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Approved Organization</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">person_check</span>
                    </div>
                </a>
            </div>

            <!-- Pending Organization Section -->
            <div class="card-single">
                <a href="pending.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Pending Organization</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">pending_actions</span>
                    </div>
                </a>
            </div>

            <!-- Expired Section -->
            <div class="card-single">
                <a href="expired.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Expired</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">archive</span>
                    </div>
                </a>
            </div>

            <!-- Events Section (With Different Background Color) -->
            <div class="card-single" style="background-color: #D46A6A; color: white;">
                <a href="events.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Events</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">event</span>
                    </div>
                </a>
            </div>
        </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Organization list</h2>
                            <button>See all <span class="material-symbols-sharp">arrow_right_alt</span></button>
                        </div>

                        <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Organization Name</td>
                                                <td>Date Approved</td>
                                                <td>Date Expired</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Love Organization</td>
                                                <td>07-05-2024</td>
                                                <td></td>
                                                <td> 
                                                    <span class="status">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DLL Dance Company</td>
                                                <td>04-23-2023</td>
                                                <td></td>
                                                <td> 
                                                    <span class="status">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DLL Dance Company</td>
                                                <td>04-23-2023</td>
                                                <td>04-23-2024</td>
                                                <td> 
                                                    <span class="status">Expired</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Love Organization</td>
                                                <td>07-05-2023</td>
                                                <td>07-05-2024</td>
                                                <td> 
                                                    <span class="status">Expired</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DLL Dance Company</td>
                                                <td>04-23-2023</td>
                                                <td></td>
                                                <td> 
                                                    <span class="status">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DLL Dance Company</td>
                                                <td>02-15-2023</td>
                                                <td>02-15-2024</td>
                                                <td> 
                                                    <span class="status">Expired</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <main>
            <div class="recent-grid">
                    <div class="projects">
                        <div class="card-to">
                            <div class="card-header">
                                <h2>Analytics</h2>
                                <button>See all <span class="material-symbols-sharp">arrow_right_alt</span></button>
                            </div>
                            
                            <div style="width: 200%; margin: auto;">
                                <canvas id="myPieChart"></canvas>
                            </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const ctx = document.getElementById('myPieChart').getContext('2d');
                                const data = {
                                    labels: ['Faith-Base', 'Community-Base', 'School-base', 'Federationn'],
                                    datasets: [{
                                        label: 'Numbers of Approved Organizations Every Year',
                                        data: [12, 19, 3, 5, 2, 3],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            
                                        ],
                                        borderWidth: 1
                                    }]
                                };

                                const config = {
                                    type: 'bar',
                                    data: data,
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            tooltip: {
                                                callbacks: {
                                                    label: function(tooltipItem) {
                                                        return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                };

                                const myPieChart = new Chart(ctx, config);
                            });
                        </script>
                    </div>    
                    </div>
            </div>
        </main>                  
    </div>
          
       
    
             
    <!--============SCRIPT==========-->
    <script src="admin.js"></script>
    <!--============icons===========-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        

    </script>
</body>
</html>