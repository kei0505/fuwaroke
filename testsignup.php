<?php session_start(); ?>
<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
    <title>新規登録</title>
</head>

<body>
    <h2 class="heading-031">新規登録</h2>
    <form action=".php" method="post">
        <label>
            <input type="text" name="" class="textbox-001" placeholder="ニックネーム" required />
        </label>
        <label>
            <?php
            $pdo = new PDO($connect, USER, PASS);
            echo '<select name="school" required>';
            $sql = $pdo->query('select * from school_category');
            foreach ($sql as $row) {
                echo '<option value="">', $row['school_name'], '</option>';
                echo "\n";
            }
            echo '</select>';
            ?>
        </label>
        <label>
            <input type="text" name="" class="textbox-001" placeholder="ポートフォリオ" />
        </label>
        <label>
            <input type="text" name="" class="textbox-001" placeholder="自己紹介" required />
        </label>
        </fieldset>
        <button class="button-005">登録</button>
    </form>
    <p></p>
</body>

</html>