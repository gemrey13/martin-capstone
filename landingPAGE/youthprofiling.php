<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LYDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Sora">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../landingPAGE/landing.css"><!-- CSS for NAVBAR -->
    <style>
        /* Youth Profiling Hero Section Styles */
        .profiling-hero {
        background-position: center;
        background-size: cover;
        background-color: rgba(21, 20, 51);
        padding: 5rem;
        position: relative;
        }

        /* Content Container */
        .profiling-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: black;
        padding: 20px;
        }

        /* Overlay */
        .profiling-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: -1;
        border-radius: 50px;
        }

        /* Logo and Text Section */
        .profiling-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        }

        .profiling-logo img {
        width: 80px;
        height: auto;
        }

        .profiling-logo h3 {
        margin: 0;
        color: black;
        font-size: 15px;
        }

        /* Title */
        .profiling-content h1 {
        color: black;
        }

        /* Description */
        .profiling-content p {
        color: black;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
        text-align: justify;
        }

        /* Button */
        .profiling-content button {
        margin-top: 2rem;
        }
    </style>
  </head>
  <body>
    <!-- NAVBAR -->
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
            <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="homepage.php">About Us</a>
            </li>
            <li class="nav-item dropdown">
            <a href="#" class="nav-link dropbtn">Programs</a>
            <div class="dropdown-content">
                <a href="scholar.php">Scholarships</a>
                <a href="youthprofiling.php" >Youth Profiling</a>
            </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="homepage.php">News</a>
            </li>
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
                <a href="#logout">Log Out</a>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- NAVBAR -->

    <!-- YOUTH PROFILING HERO SECTION -->
    <section class="profiling-hero">
    <div class="profiling-content">
        <!-- Overlay -->
        <div class="profiling-overlay"></div>
        
        <!-- Logo -->
        <div class="profiling-logo">
        <img src="../landingPAGE/lydo-logo-hd.png" alt="LYDO Logo">
        <h3>Lucena Youth Development Office</h3>
        </div>
        <br>
        <br>
        <br>

        <!-- Title -->
        <h1>Lucena Youth Profiling System</h1>
        <br>
        <br>

        <!-- Description -->
        <p>
        The Youth Profiling System aims to gather vital information about the youth of Lucena City to better understand and address their needs. 
        By participating, you provide valuable data that helps the Lucena Youth Development Office plan effective programs and services. 
        Your privacy is protected under the Data Privacy Act of 2012.
        </p>

        <!-- Apply Button -->
        <div>
        <button class="btn btn-primary px-5 py-2" onclick="startProfiling()">Start Profiling</button>
        </div>
    </div>
    </section>

    <script>
        function startProfiling() {
            alert("Redirecting to the Youth Profiling Form...");
            window.location.href = "profiling-form.php"; 
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
