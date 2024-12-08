<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

<?php
include('../components/navbar.php');
?>

<div class="main-content">
    <header>
        <h1>
            <label for="nav-toogle">
                <span class="las la-bars"></span>
            </label>
            User
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


<div class="right">
    <h1>Right</h1>
</div>

<?php include('../components/footer.php'); ?>