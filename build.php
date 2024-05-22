<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>掲示板作成</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-top: 0;
        }
        form {
            margin-top: 20px;
        }
        label, textarea, input {
            display: block;
            width: calc(100% - 20px);
            margin: 10px auto;
            text-align: left;
        }
        textarea {
            height: 150px;
            resize: none;
        }
        button {
            display: block;
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px auto;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>掲示板作成</h1>
        <?php
        // データベース接続情報
        $dsn = 'mysql:host=mysql305.phy.lolipop.lan;dbname=LAA1517492-fuwaroke;charset=utf8';
        $username = 'LAA1517492';
        $password = 'Pass0313';

        try {
            // PDOインスタンスの作成
            $pdo = new PDO($dsn, $username, $password);
            
            // エラーモードの設定（例外をスローする）
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // フォームが送信されたら処理を実行
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // フォームから送信されたデータを取得
                $title = $_POST['post_name'];
                $category = $_POST['cate_name'];
                $first_message = $_POST['t_post'];

                // 掲示板をデータベースに挿入
                $sql = "INSERT INTO boards (title, category, first_message) VALUES (:title, :category, :first_message)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':category', $category, PDO::PARAM_STR);
                $stmt->bindParam(':first_message', $first_message, PDO::PARAM_STR);
                
                if ($stmt->execute()) {
                    echo "掲示板が作成されました";
                } else {
                    echo "エラー: 掲示板を作成できませんでした";
                }
            }

            // 接続を閉じる
            $pdo = null;

        } catch (PDOException $e) {
            // エラーメッセージの表示
            die("データベースに接続できません: " . $e->getMessage());
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="post_name">タイトル</label>
            <input type="text" id="post_name" name="post_name" required>
            
            <label for="cate_name">カテゴリー</label>
            <input type="text" id="cate_name" name="cate_name" required>
            
            <label for="t_post">一言</label>
            <textarea id="t_post" name="t_post" maxlength="1000" required></textarea>
            
            <button type="submit">作成</button>
        </form>
    </div>
</body>
</html>