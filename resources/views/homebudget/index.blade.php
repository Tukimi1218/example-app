<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>家計簿アプリ</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="p-7">
        <h1 class="text-3xl font-bold">家計簿アプリ</h1>
    </header>

    <section class="container1">
        <div class="balance1">
            <h3 class="mb-3">支出一覧</h3>
            <table>
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>カテゴリ</th>
                        <th>金額</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 支出データのループ処理 -->

                </tbody>
            </table>
        </div>

        <div class="add-balance">
            <h3 class="mb-4">支出の追加</h3>
            <form action="/balances" method="POST">
                <label for="date">日付:</label>
                <input type="date" id="date" name="date">

                <label for="category">カテゴリ:</label>
                <select name="category" id="category"></select>

                <label for="price">金額:</label>
                <input type="text" id="price" name="price">

                <button type="submit">追加</button>
            </form>
        </div>
    </section>
</body>
</html>
