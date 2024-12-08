<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

<?php
include('../components/navbar.php');
?>

<link rel="stylesheet" href="announcement.css">

<div class="main-content">
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


    <?php include('../components/footer.php'); ?>