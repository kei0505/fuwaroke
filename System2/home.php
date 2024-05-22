<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include('db.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ホーム</title>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <h1>ホーム</h1>
        <p>全体チャット掲示板</p>
        <?php
        $sql = "SELECT * FROM post ORDER BY t_create_time DESC";
        $result = $conn->query($sql);
        if ($result === FALSE) {
            echo "Error: " . $conn->error;
        } else {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2>" . htmlspecialchars($row['post_title']) . "</h2>";
                echo "<p>投稿者: " . htmlspecialchars($row['user_id']) . "</p>";
                echo "<p>作成日時: " . htmlspecialchars($row['t_create_time']) . "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
