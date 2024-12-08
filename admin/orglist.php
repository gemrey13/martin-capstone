<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $organization_id = $_POST['organization_id'];
    $action = $_POST['action'];

    // Add your database connection code here

    if ($action == 'accept') {
        // Update the database to mark the organization as approved
        // $sql = "UPDATE organizations SET status='approved' WHERE id=$organization_id";
        // mysqli_query($conn, $sql);
        
        // Redirect to organization list
        header("Location: organization_list.php");
    } else if ($action == 'decline') {
        // Update the database to mark the organization as declined
        // $sql = "UPDATE organizations SET status='declined' WHERE id=$organization_id";
        // mysqli_query($conn, $sql);
        
        // Redirect to a different page or back to the notifications page
        header("Location: notifications.php");
    }
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="admin.css">
    <style>
        .customers .card-body .customer form {
            display: inline;
        }

        .customers .card-body .customer form button {
            background: #28a745;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            margin: 0 0.5rem;
            cursor: pointer;
            border-radius: 5px;
        }

        .customers .card-body .customer form button[name="action"][value="decline"] {
            background: #dc3545;
        }

        .customers .card-body .customer form button:hover {
            opacity: 0.9;
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
                    <a href="admin.php">
                        <span class="material-symbols-sharp">grid_view</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="pending.php">
                        <span class="material-symbols-sharp">pending_actions</span>
                        <span>Pending Reg.</span>
                    </a>
                </li>

                <li>
                    <a href="approved.php">
                        <span class="material-symbols-sharp">thumb_up</span>
                        <span>Organization List</span>
                    </a>
                </li>
                    
                   
                <li>
                    <a href="annual.php">
                        <span class="material-symbols-sharp">layers</span>
                        <span>Annual Report</span>
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
                <label for="nav-toogle">
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
                                <h2>Organization List Status</h2>
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
        </main>   
           
    <!--============SCRIPT==========-->
    <script src="admin.js"></script>
    <!--============icons===========-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>