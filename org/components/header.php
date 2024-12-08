<?php
session_start();
require '../../connection/connection.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/login/");
    exit();
}

if ($_SESSION['role'] !== 'organization') {
    header("Location: ../../home/");
    exit();
}

$userId = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT status FROM organizations WHERE user_id = :user_id LIMIT 1");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $orgStatus = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($orgStatus['status'] !== 'approved') {
        header("Location: ../../home/");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LYDO | Organization</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .chart-header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        @media (max-width: 768px) {
            .chart-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>