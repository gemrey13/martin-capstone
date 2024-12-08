<?php
include('../components/header.php');

$isLoggedIn = isset($_SESSION['user_id']);
?>

<link rel="stylesheet" href="scholar.css">

    <section class="scholarship-hero">
        <div class="scholarship-content">
            <div class="scholarship-overlay"></div>
            <div class="scholarship-logo">
                <img src="../landingPAGE/lydo-logo-hd.png" alt="LYDO Logo">
                <h3>Lucena Youth Development Office</h3>
            </div>
            <br>
            <br>
            <br>

            <h1>Online Scholarship Application</h1>
            <br>
            <br>

            <p>
                The Scholarship Online Application is an online platform aimed at providing better service for the youth of Lucena City.
                By registering, you share essential information with the Lucena Youth Development Office, allowing us to cater to your
                needs effectively. Rest assured, your data will be protected under the Data Privacy Act of 2012.
            </p>

            <div>
                <button class="btn btn-primary px-5 py-2" onclick="applyNow()">Apply for a Scholarship</button>
            </div>
        </div>
    </section>

    <script>
        function applyNow() {
            alert("Redirecting to the Scholarship Application Form...");
            window.location.href = "./scholar-form/";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>