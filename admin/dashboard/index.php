<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

<?php
include('../components/navbar.php');
?>

<?php
require '../../connection/connection.php';

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT org.id, org.org_name AS name, org.approved_at, org.declined_at, org.created_at, org.status FROM organizations org");
    $stmt->execute();

    $organizations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log($e->getMessage());
}

if (isset($_GET['message']) && !empty($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);  // Sanitize the message before displaying
    $message_type = isset($_GET['type']) ? $_GET['type'] : 'info'; // Default to 'info' type
}
?>

<link rel="stylesheet" href="../components/alert.css">

<link rel="stylesheet" href="../components/button.css">

<div class="main-content">
    <main>
        <div class="cards">
            <!-- Approved Organization Section -->
            <div class="card-single">
                <a href="orglist.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Approved Organization</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">person_check</span>
                    </div>
                </a>
            </div>

            <!-- Pending Organization Section -->
            <div class="card-single">
                <a href="pending.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Pending Organization</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">pending_actions</span>
                    </div>
                </a>
            </div>

            <!-- Expired Section -->
            <div class="card-single">
                <a href="expired.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Expired</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">archive</span>
                    </div>
                </a>
            </div>

            <!-- Events Section (With Different Background Color) -->
            <div class="card-single" style="background-color: #D46A6A; color: white;">
                <a href="events.php" style="text-decoration: none; color: inherit;">
                    <div>
                        <h1>54</h1>
                        <span>Events</span>
                    </div>
                    <div>
                        <span class="material-symbols-sharp">event</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h2>Organization List</h2>
                        <button>See all <span class="material-symbols-sharp">arrow_right_alt</span></button>
                    </div>

                    <div class="card-body">
                        <?php if (isset($message)): ?>
                            <div class="alert alert-<?= $message_type; ?>">
                                <span class="alert-icon">
                                    <?php
                                    // Add icons based on message type
                                    if ($message_type === 'success') {
                                        echo '✔️';
                                    } elseif ($message_type === 'error') {
                                        echo '❌';
                                    } else {
                                        echo 'ℹ️';
                                    }
                                    ?>
                                </span>
                                <p><?= $message; ?></p>
                                <button class="close-alert" onclick="this.parentElement.style.display='none'">×</button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>Organization Name</th>
                                        <th>Date Approved/Expired</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($organizations)): ?>
                                        <?php foreach ($organizations as $org): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($org['name']); ?></td>

                                                <td>
                                                    <?php
                                                    if ($org['status'] === 'approved') {
                                                        echo htmlspecialchars($org['approved_at']);
                                                    } elseif ($org['status'] === 'declined') {
                                                        echo htmlspecialchars($org['declined_at']);
                                                    } else {
                                                        echo 'On Review';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?= htmlspecialchars($org['created_at']); ?>

                                                </td>

                                                <td>
                                                    <span class="status"><?= htmlspecialchars($org['status']); ?></span>
                                                </td>

                                                <td>
                                                    <?php if ($org['status'] === 'on review'): ?>
                                                        <!-- Add 'id' and 'callback' parameters properly -->
                                                        <a href="../action/approved.php?id=<?= $org['id']; ?>&callback=../dashboard/" class="btn btn-success btn-sm">Approve</a>
                                                        <a href="../action/declined.php?id=<?= $org['id']; ?>&callback=../dashboard/" class="btn btn-danger btn-sm">Decline</a>
                                                    <?php else: ?>
                                                        <span>Action Not Available</span>
                                                    <?php endif; ?>
                                                </td>


                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">No organizations found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <main>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card-to">
                        <div class="card-header">
                            <h2>Analytics</h2>
                            <button>See all <span class="material-symbols-sharp">arrow_right_alt</span></button>
                        </div>

                        <div style="width: 200%; margin: auto;">
                            <canvas id="myPieChart"></canvas>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const ctx = document.getElementById('myPieChart').getContext('2d');
                                const data = {
                                    labels: ['Faith-Base', 'Community-Base', 'School-base', 'Federationn'],
                                    datasets: [{
                                        label: 'Numbers of Approved Organizations Every Year',
                                        data: [12, 19, 3, 5, 2, 3],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',

                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',

                                        ],
                                        borderWidth: 1
                                    }]
                                };

                                const config = {
                                    type: 'bar',
                                    data: data,
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            tooltip: {
                                                callbacks: {
                                                    label: function(tooltipItem) {
                                                        return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                };

                                const myPieChart = new Chart(ctx, config);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </main>
</div>

<?php include('../components/footer.php'); ?>