<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

<div class="main-content">

    <?php
    include('../components/navbar.php');
    ?>

    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1>5</h1>
                    <span>Total Post</span>
                </div>
                <div>
                    <span class="material-symbols-sharp">post</span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>0</h1>
                    <span>LYDO Announcement</span>
                </div>
                <div>
                    <span class="material-symbols-sharp">campaign</span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>3</h1>
                    <span>Activities</span>
                </div>
                <div>
                    <span class="material-symbols-sharp">event</span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>3</h1>
                    <span> Quarterly Report</span>
                </div>
                <div>
                    <span class="material-symbols-sharp">report</span>
                </div>
            </div>
        </div>

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

<?php include('../components/footer.php'); ?>