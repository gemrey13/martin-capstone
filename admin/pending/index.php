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

    $stmt = $pdo->prepare("SELECT org.id, org.org_name AS name, org.approved_at, org.declined_at, org.created_at, org.status FROM organizations org ");
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
                                                        <a href="../action/approved.php?id=<?= $org['id']; ?>&callback=../pending/" class="btn btn-success btn-sm">Approve</a>
                                                        <a href="../action/declined.php?id=<?= $org['id']; ?>&callback=../pending/" class="btn btn-danger btn-sm">Decline</a>
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

    </main>
</div>

<?php include('../components/footer.php'); ?>