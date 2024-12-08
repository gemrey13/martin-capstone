<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .chart-header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        @media (max-width: 768px) {
            .chart-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <!--============NAVIGATION BAR==========-->
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="logo">
            <h2><img src="assets/images/LYDO-logo.png">LYDC</h2>
        </div>
        
        <div class="sidebar-menu">
        <ul>
        li>
                    <a href="admin.php">
                        <span class="material-symbols-sharp">grid_view</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="pending.php">
                        <span class="material-symbols-sharp">pending_actions</span>
                        <span>Pending Req.</span>
                    </a>
                </li>

                <li>
                    <a href="approved.php">
                        <span class="material-symbols-sharp">thumb_up</span>
                        <span>Org. List</span>
                    </a>
                </li>
                   
                <li>
                    <a href="annual.php">
                        <span class="material-symbols-sharp">layers</span>
                        <span>Report</span>
                    </a>
                </li>

                <li>
                    <a href="announcement.php">
                        <span class="material-symbols-sharp">Announcement</span>
                        <span>Announcement</span>
                    </a>
                </li>
      
                <li>
                    <a href="Analytics.php">
                        <span class="material-symbols-sharp">analytics</span>
                        <span>Analytics</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.php">
                        <span class="material-symbols-sharp">event_note</span>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="report.php">
                        <span class="material-symbols-sharp">report</span>
                        <span>Report Generation</span>
                    </a>
                </li>
                <li>
                    <a href="planing.php">
                        <span class="material-symbols-sharp">plan</span>
                        <span>Event PLaning</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Admin
            </h1>
            <div class="user-wrapper">
                <img src="assets/images/avatar.jpg" width="40px" height="40px" alt="">
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
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Analytics</h2>
                        </div>
                        <div class="chart-container">
                            <h3 class="chart-header">Approved Organizations Every Year</h3>
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
</body>
</html>
