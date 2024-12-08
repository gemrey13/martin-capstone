<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

<?php
include('../components/navbar.php');
?>

<div class="main-content">
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

    <?php include('../components/footer.php'); ?>