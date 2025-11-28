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

    <!-- エラーメッセージ -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 text-xs italic">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="container1">
        <div class="balance1">
            <h3 class="mb-3">支出一覧</h3>

            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
                <div class="alert alert-succes text-green-500 italic">
                    {{ session('flash_message') }}
                </div>
            @endif
            @if (session('flash_error_message'))
                <div class="alert alert-danger text-red-500 italic">
                    {{ session('flash_error_message') }}
                </div>
            @endif

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
            <form action="{{ route('homebudget.store') }}" method="POST">
                @csrf
                <label for="date">日付:</label>
                <input type="date" id="date" name="date">
                @if ($errors->has('date')) <span class="pb-3 text-red-500 text-s italic">{{ $errors->first('date') }}</span> @endif

                <label for="category">カテゴリ:</label>
                <select name="category" id="category">
                    <option value="">カテゴリを選択</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category')) <span class="pb-3 text-red-500 text-s italic">{{ $errors->first('category') }}</span> @endif

                <label for="price">金額:</label>
                <input type="text" id="price" name="price">
                @if ($errors->has('price')) <span class="pb-3 text-red-500 text-s italic">{{ $errors->first('price') }}</span> @endif

                <button type="submit">追加</button>
            </form>
        </div>
    </section>
</body>
</html>
