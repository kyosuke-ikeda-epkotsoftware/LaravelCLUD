<!DOCTYPE html>
<html lang="ja">

<head>
    <title>新規ユーザー登録</title>
    <link rel="canonical" href="https://getbootstrap.jp/docs/5.3/examples/checkout/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>新規ユーザー登録</h2>
        </div>

        <div class="col-md-8 order-md-1">
        <x-alert type="danger" :session="session('danger')"/>
            <form action="{{ route('createUser') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" placeholder="名前を入力してください" name="name" required >
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="パスワードを入力してください" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">パスワードの確認</label>
                    <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="同じパスワードを入力してください" required>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">登録する</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>