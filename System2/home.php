<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// 全体掲示板のIDを取得
$stmt = $conn->prepare("SELECT id FROM boards WHERE post_title = '全体'");
$stmt->execute();
$board = $stmt->fetch(PDO::FETCH_ASSOC);
$board_id = $board['id'];

// 全体掲示板の投稿を取得
$posts = $conn->prepare("SELECT posts.*, users.name FROM posts JOIN users ON posts.user_id = users.id WHERE posts.board_id = :board_id ORDER BY posts.created_at DESC");
$posts->bindParam(':board_id', $board_id);
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO posts (board_id, user_id, comment) VALUES (:board_id, :user_id, :comment)");
    $stmt->bindParam(':board_id', $board_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();

    header('Location: home.php');
    exit;
}
?>

<h2>全体掲示板</h2>
<?php foreach ($posts as $post): ?>
    <div>
        <p><strong><?php echo htmlspecialchars($post['name']); ?>:</strong> <?php echo htmlspecialchars($post['t_post']); ?></p>
    </div>
<?php endforeach; ?>

<form method="post">
    <textarea name="comment" required></textarea><br>
    <button type="submit">投稿</button>
</form>
