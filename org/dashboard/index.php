<?php
include('../components/header.php');
?>
    <!--============NAVIGATION BAR==========-->
    <input type="checkbox" id="nav-toogle">
    <div class="sidebar">
        <div class="logo">
            <h2><img src="../../assets/images/LYDO-logo.png">LYDC</h2>
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
                <img src="../../assets/images/avatar.jpg" width="40px" height="40px" alt="">
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

    <?php include('../components/footer.php'); ?>
