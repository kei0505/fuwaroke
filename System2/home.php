<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO posts (name, comment) VALUES (:name, :comment)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
    header("Location: index.php");
}

$posts = $conn->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .post-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <h1>掲示板</h1>
    <button onclick="showForm()">投稿する</button>

    <div class="overlay" id="overlay" onclick="hideForm()"></div>

    <div class="post-form" id="postForm">
        <form action="index.php" method="post">
            <label for="name">名前:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="comment">コメント:</label><br>
            <textarea id="comment" name="comment" required></textarea><br><br>
            <button type="submit">投稿</button>
            <button type="button" onclick="hideForm()">キャンセル</button>
        </form>
    </div>

    <div>
        <?php foreach ($posts as $post): ?>
            <div>
                <h2><?php echo htmlspecialchars($post['name']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($post['comment'])); ?></p>
                <small><?php echo $post['created_at']; ?></small>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>

    <script>
        function showForm() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('postForm').style.display = 'block';
        }

        function hideForm() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('postForm').style.display = 'none';
        }
    </script>
</body>
</html>

