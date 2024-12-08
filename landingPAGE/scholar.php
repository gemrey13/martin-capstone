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
        /* Scholarship Hero Section Styles */
        .scholarship-hero {
        background-position: center;
        background-size: cover;
        background-color: rgba(21, 20, 51);
        padding: 5rem;
        position: relative;
        }

        /* Content Container */
        .scholarship-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: black;
        padding: 20px;
        }

        /* Overlay */
        .scholarship-overlay {
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
        .scholarship-logo {
        display: flex;
        align-items: center; /* Centers the items vertically */
        justify-content: center; /* Centers the items horizontally */
        gap: 10px; /* Adds space between the logo and the text */
        }

        .scholarship-logo img {
        width: 80px; /* Adjust logo size */
        height: auto;
        }

        .scholarship-logo h3 {
        margin: 0;
        color: black; /* Makes sure the text is white */
        font-size: 15px;
        }


        /* Title */
        .scholarship-content h1 {
        color: black;
        }

        /* Description */
        .scholarship-content p {
        color: black;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
        text-align: justify;
        }

        /* Button */
        .scholarship-content button {
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
                <a href="scholar.php" >Scholarships</a>
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


    <!-- SCHOLARSHIP APPLICATION HERO SECTION -->
    <section class="scholarship-hero">
    <div class="scholarship-content">
        <!-- Overlay -->
        <div class="scholarship-overlay"></div>
        
        <!-- Logo -->
        <div class="scholarship-logo">
        <img src="../landingPAGE/lydo-logo-hd.png" alt="LYDO Logo">
        <h3>Lucena Youth Development Office</h3>
        </div>
        <br>
        <br>
        <br>

        <!-- Title -->
        <h1>Online Scholarship Application</h1>
        <br>
        <br>

        <!-- Description -->
        <p>
        The Scholarship Online Application is an online platform aimed at providing better service for the youth of Lucena City. 
        By registering, you share essential information with the Lucena Youth Development Office, allowing us to cater to your 
        needs effectively. Rest assured, your data will be protected under the Data Privacy Act of 2012.
        </p>

        <!-- Apply Button -->
        <div>
        <button class="btn btn-primary px-5 py-2" onclick="applyNow()">Apply for a Scholarship</button>
        </div>
    </div>
    </section>

    <script>
        function applyNow() {
            alert("Redirecting to the Scholarship Application Form...");
            window.location.href = "scholarship-form.php"; 
        }
    </script>

   
     
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>



