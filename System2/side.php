<?php
// 必要に応じてデータベース接続のためのコードを追加してください
include('db.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>サイドバー</title>
    <style>
        .sidebar {
            background-color: #f0f0f0;
            padding: 10px;
            width: 200px;
            border-right: 1px solid #ddd;
        }
        .sidebar h3 {
            margin-top: 0;
        }
        .sidebar a {
            display: block;
            margin: 5px 0;
            text-decoration: none;
            color: #333;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>カテゴリ</h3>
        <?php
        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<a href='category.php?cate_id=" . htmlspecialchars($row['cate_id']) . "'>" . htmlspecialchars($row['cate_name']) . "</a><br>";
        }
        ?>
        <h3>全体チャット</h3>
        <a href="chat.php">チャットへ</a>
    </div>
</body>
</html>
