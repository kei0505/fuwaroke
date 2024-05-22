<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ヘッダー</title>
    <style>
        .header {
            background-color: #f8f8f8;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .header form {
            display: flex;
        }
        .header input[type="text"] {
            flex-grow: 1;
            padding: 5px;
        }
        .header button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <form method="GET" action="search.php">
            <input type="text" name="query" placeholder="検索">
            <button type="submit">検索</button>
        </form>
    </div>
</body>
</html>
