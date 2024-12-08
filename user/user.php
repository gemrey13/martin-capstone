


<a href="logout.php">Logout</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="user.css">
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
    <input type="checkbox" id="nav-toogle">
    <div class="sidebar">
        <div class="logo">
            <h2><img src="assets/images/LYDO-logo.png">LYDC</h2>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="user.php">
                        <span class="material-symbols-sharp">grid_view</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="post.php">
                        <span class="material-symbols-sharp">post</span>
                        <span>Post</span>
                    </a>
                </li>  

                <li>
                    <a href="lydo_announcement.php">
                        <span class="material-symbols-sharp">Announcement</span>
                        <span>LYDO Announcement</span>
                    </a>
                </li>

                <li>
                    <a href="message.php">
                        <span class="material-symbols-sharp">chat</span>
                        <span>Messages</span>
                    </a>
                </li>

                <li>
                    <a href="faq.php">
                        <span class="material-symbols-sharp">question_mark</span>
                        <span>FAQ's</span>
                    </a>
                </li>
                <li>
                    <a href="program.php">
                        <span class="material-symbols-sharp">create</span>
                        <span>Create Program</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.php">
                        <span class="material-symbols-sharp">event_note</span>
                        <span>Calendar</span>
                    </a>
                </li>
                
                
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>
                <label for="nav-toogle">
                    <span class="las la-bars"></span>
                </label>
                Organization Name
            </h1>


            <div class="user-wrapper">
                <img src="assets/images/avatar.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Martin Saturay</h4>
                    <small>User</small>
                    <a href="/capstone/landing.php">
                        <span class="material-symbols-sharp"></span>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </header>

        <main>
        <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>5</h1>
                        <span>Total Post</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">post</span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <span>LYDO Announcement</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">campaign</span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>3</h1>
                        <span>Activities</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">event</span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>3</h1>
                        <span> Quarterly Report</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">report</span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                         <div class="card-header">
                            <h2>Announcement</h2>
                            <button>See all <span class="material-symbols-sharp">arrow_right_alt</span></button>
                        </div>
                                
                        <div class="announcement">
                            <h1>YORP CERTIFICATES FOR SGLG!</h1>
                            <p>4 weeks ago</p>
                            <p>We are aware that one of the data sources LYDOs need for Youth Development Indicators are is "Copies of YORP Certificates".</p>
                            <p>Since there are challenges securing the individual certificates of organizations, we confirmed with DILG that the certified list generated from your respective LYDO account is enough as data source in lieu of the individual certificates.</p>
                            <p>Please see this NYC advisory for details: <a href="https://bit.ly/YORP23">https://bit.ly/YORP23</a></p>
                        </div>
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