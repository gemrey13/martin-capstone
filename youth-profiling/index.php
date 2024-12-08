<?php
include('../components/header.php');

$isLoggedIn = isset($_SESSION['user_id']);
?>
<link rel="stylesheet" href="profiling.css">

<section class="profiling-hero">
    <div class="profiling-content">
        <div class="profiling-overlay"></div>

        <div class="profiling-logo">
            <img src="../landingPAGE/lydo-logo-hd.png" alt="LYDO Logo">
            <h3>Lucena Youth Development Office</h3>
        </div>
        <br>
        <br>
        <br>

        <h1>Lucena Youth Profiling System</h1>
        <br>
        <br>

        <p>
            The Youth Profiling System aims to gather vital information about the youth of Lucena City to better understand and address their needs.
            By participating, you provide valuable data that helps the Lucena Youth Development Office plan effective programs and services.
            Your privacy is protected under the Data Privacy Act of 2012.
        </p>

        <div>
            <button class="btn btn-primary px-5 py-2" onclick="startProfiling()">Start Profiling</button>
        </div>
    </div>
</section>

<script>
    function startProfiling() {
        alert("Redirecting to the Youth Profiling Form...");
        window.location.href = "./profiling-form/";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>