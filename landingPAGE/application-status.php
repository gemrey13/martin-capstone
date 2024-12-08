<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LYDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Sora">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../landingPAGE/application-status.css">
    <style>
        body {
            background-color: rgba(21, 20, 51);
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-1 sticky-top bg-body-tertiary">
        <div class="container">
            <a href="#" class="navbar-logo">
                <img src="../landingPAGE/lydo-logo-hd.png" alt="LYDO Logo" class="navbar-logo-img">
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
                        <div class="dropdown-content" style="font-size: 15px;">
                            <a href="scholar.php">Scholarships</a>
                            <a href="#">Youth Profiling</a>
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
                        <div class="dropdown-content" style="font-size:13px;">
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

    <!-- APPLICATION SAMPLE -->
    <div class="application-status-container">
        <h2 class="heading">My Application Status</h2>

        <div class="application-info">
            <p><strong>Application ID:</strong> <span id="statusTransactionId"></span></p>
            <p><strong>Organization Name:</strong> <span id="statusOrgName"></span></p>
            <p><strong>Date Submitted:</strong> <span id="statusSubmissionDateTime"></span></p>
        </div>

        <div class="status-card">
            <h3>Application Status</h3>
            <p>Your application is currently <span class="status pending">Pending</span>.</p>
            <p class="remarks">Remarks: Under review. Please check back later for updates.</p>
        </div>

        <div class="status-update">
            <button class="check-status-btn">Check Status Again</button>
        </div>
    </div>
    <!-- END APPLICATION SAMPLE -->

    <script>
        // Retrieve the stored data from sessionStorage
        var transactionId = sessionStorage.getItem("transactionId");
        var orgName = sessionStorage.getItem("orgName");
        var submissionDateTime = sessionStorage.getItem("submissionDateTime");

        // Display the retrieved data in the status page
        document.getElementById('statusTransactionId').textContent = transactionId;
        document.getElementById('statusOrgName').textContent = orgName;
        document.getElementById('statusSubmissionDateTime').textContent = submissionDateTime;
    </script>

    <!-- Add Bootstrap JS and dependencies if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-giJF6kkoqNQeL6pgeI27pCctO2vF+29v3b4YoRIbP2pFf5a2Jbxa6j/rPp2btb7Q" crossorigin="anonymous"></script>
</body>
</html>
