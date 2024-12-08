<?php session_start(); ?>

<nav class="navbar navbar-expand-lg py-1 sticky-top bg-body-tertiary">
    <div class="container">
        <a href="#" class="navbar-logo">
            <img src="../landingPAGE/lydo-logo-hd.png" alt="logo">
            <span style="color:black;">Lucena City Youth Development Council</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropbtn">Programs</a>
                    <div class="dropdown-content">
                        <a href="scholar.php" onclick="showContent('scholar')">Scholarships</a>
                        <a href="youthprofiling.php" onclick="showContent('profiling')">Youth Profiling</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news">News</a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- If the user is logged in, show the profile and logout options -->
                    <li class="nav-item">
                        <a class="nav-link" href="#notifications">
                            <i class='bx bxs-bell'></i> 
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropbtn">
                            <i class='bx bxs-user-circle profile-icon'></i> Profile
                        </a>
                        <div class="dropdown-content" style="font: size 13px;">
                            <a href="#dashboard">Dashboard</a>
                            <a href="application-status.php">Monitor Application Status</a>
                            <a href="#account-settings">Account Settings</a>
                            <a href="../auth/logout.php">Log Out</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../auth/login/">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
