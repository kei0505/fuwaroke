<!-- header.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サイトのタイトル</title>
    <link rel="stylesheet" href="style.css"> <!-- スタイルシートへのリンク -->
    <style>
        /* ヘッダーのスタイルをここに追加 */
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .search {
            display: flex;
            align-items: center;
        }
        .search input[type="text"] {
            padding: 5px;
            margin-right: 10px;
        }
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }
        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }
        .nav-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 50px;
            right: 20px;
            background-color: #333;
            border: 1px solid #444;
        }
        .nav-menu a {
            color: white;
            padding: 10px;
            text-decoration: none;
            text-align: center;
        }
        .nav-menu a:hover {
            background-color: #444;
        }
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">サイトのロゴ</div>
        <div class="search">
            <input type="text" placeholder="検索...">
            <button>検索</button>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav class="nav-menu" id="navMenu">
            <a href="#">ホーム</a>
            <a href="#">サービス</a>
            <a href="#">お問い合わせ</a>
            <a href="#">その他</a>
        </nav>
    </header>
    <script>
        function toggleMenu() {
            var menu = document.getElementById('navMenu');
            if (menu.style.display === 'flex') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'flex';
            }
        }
    </script>
</body>
</html>
