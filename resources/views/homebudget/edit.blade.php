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
        <h1 class="text-3xl font-bold">支出編集</h1>
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

    <div class="flex justify-center">
        <div class="form-balance">
            <form action="{{ route('homebudget.update', [$home_budget->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="date">日付:</label>
                <input type="date" id="date" name="date" value="{{ $home_budget->date }}">
                @if ($errors->has('date')) <span class="pb-3 text-red-500 text-s italic">{{ $errors->first('date') }}</span> @endif

                <label for="category">カテゴリ:</label>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $home_budget->category_id ? 'selected' : ''}}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('category')) <span class="pb-3 text-red-500 text-s italic">{{ $errors->first('category') }}</span> @endif

                <label for="price">金額:</label>
                <input type="text" id="price" name="price" value="{{ $home_budget->price }}">
                @if ($errors->has('price')) <span class="pb-3 text-red-500 text-s italic">{{ $errors->first('price') }}</span> @endif

                <div class="button-container">
                    <button type="submit">追加</button>
                    <input type="button" id="back-button" class="back-button" value="戻る">
                </div>
            </form>
        </div>
    </div>
    <script>
        const backButton = document.getElementById('back-button');
        
        backButton.addEventListener('click', function () {
            window.location.href = 'http://localhost/example-app/public/';
        });
    </script>
</body>
</html>
