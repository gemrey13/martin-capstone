<?php
require '../../connection/connection.php';

try {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $org_id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE organizations SET status = 'declined', declined_at = NOW(), approved_at = NULL WHERE id = :id");
        $stmt->bindParam(':id', $org_id, PDO::PARAM_INT);
        $stmt->execute();

        $callback = isset($_GET['callback']) ? $_GET['callback'] : '../dashboard/';
        
        header("Location: $callback?message=Organization declined!&type=success");
        exit;
    } else {
        header('Location: organization_list.php?message=Invalid organization ID&type=error');
        exit;
    }
} catch (PDOException $e) {
    error_log($e->getMessage());  
    header('Location: organization_list.php?message=Error declining the organization&type=error');
    exit;
}
?>
