<?php
echo "テストだyooooooooo";
?>

<select>
    <?php
    for ($i = 1; $i <= 13; $i++) {
        echo '<option value="', $i, '">',
            $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from school_category where school_id=?');
        foreach ($sql as $row) {
            echo $row['school_name'];
        }
        '</option>';
    }
    ?>
    <select>

        <?php
        $pdo = new PDO($connect, USER, PASS);
        for ($i = 1; $i <= 13; $i++) {
            // プリペアドステートメントを準備
            $stmt = $pdo->prepare('SELECT * FROM school_category WHERE school_id = ?');
            // パラメータをバインド
            $stmt->bindParam(1, $i, PDO::PARAM_INT);
            // SQLを実行
            $stmt->execute();
            // 結果を取得
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // リストのオプションを出力
            foreach ($results as $row) {
                echo '<option value="' . $i . '">' . $row['school_name'] . '</option>';
            }
        }
        ?>
    </select>



    ?>
</select>