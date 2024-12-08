<?php
include('../components/header.php');
include('../components/sidebar.php');
include('../components/navbar.php');

require '../../connection/connection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/login/");
    exit();
}

$userId = $_SESSION['user_id'];

try {
   
    $stmt = $pdo->prepare("SELECT p.id, p.title, p.text, p.image, p.created_at, u.firstname, u.lastname 
                       FROM posts p 
                       LEFT JOIN users u ON p.user_id = u.id 
                       ORDER BY p.created_at DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
        padding: 2px 16px;
    }

    .post {
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .post img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .user-info {
        margin-top: 10px;
    }

    .user-info img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .user-info h4 {
        display: inline-block;
        margin-left: 10px;
    }
</style>

<div class="main-content">
    <main>
        <div class="posts">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post">
                        <div class="user-info">
                            <h4>Posted By:<?= htmlspecialchars($post['firstname'] . ' ' . $post['lastname']); ?></h4>
                        </div>

                        <h3>Title: <?= htmlspecialchars($post['title']); ?></h3>
                        <p>Description: <?= nl2br(htmlspecialchars($post['text'])); ?></p>
                        <?php if ($post['image']): ?>
                            <img src="<?= '/capstone/admin/posts/' . basename($post['image']); ?>" alt="Post Image">
                        <?php endif; ?>
                        <p><small>Posted on: <?= date("F j, Y, g:i a", strtotime($post['created_at'])); ?></small></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No posts available.</p>
            <?php endif; ?>
        </div>

    </main>
</div>

<?php include('../components/footer.php'); ?>