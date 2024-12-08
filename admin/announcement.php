<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="announcement.css">
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
                
            </ul>>
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

    <h2>Post an Update</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="postTitle">Title:</label><br>
        <input type="text" id="postTitle" name="title" required><br><br>

        <label for="postText">Text:</label><br>
        <textarea id="postText" name="text" rows="5" cols="50" required></textarea><br><br>

        <label for="postImage">Select Image to Upload:</label><br>
        <input type="file" name="image" id="postImage" accept="image/*" required><br><br>

        <input type="submit" value="Post">
    </form>
</body>
</html>


<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect post data
    $title = $_POST['title'];
    $text = $_POST['text'];
    
    // Directory where images will be saved
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate image upload
    if (isset($_FILES["image"])) {
        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check if file already exists
            if (!file_exists($target_file)) {
                // Check file size (5MB limit)
                if ($_FILES["image"]["size"] <= 5000000) {
                    // Only allow certain file formats
                    if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                        // Move file to the uploads directory
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            // Now you can save $title, $text, and $target_file (image path) to the database
                            // Example SQL query (assuming you have a table named 'posts'):
                            /*
                            $conn = new mysqli("hostname", "username", "password", "database");
                            $stmt = $conn->prepare("INSERT INTO posts (title, text, image) VALUES (?, ?, ?)");
                            $stmt->bind_param("sss", $title, $text, $target_file);
                            $stmt->execute();
                            $stmt->close();
                            $conn->close();
                            */
                            echo "Post uploaded successfully!";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                } else {
                    echo "Sorry, your file is too large.";
                }
            } else {
                echo "File already exists.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>






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
           
    <!--============SCRIPT==========-->
    <script src="admin.js"></script>
    <!--============icons===========-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>