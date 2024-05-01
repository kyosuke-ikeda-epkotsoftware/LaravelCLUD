<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>ログインフォーム</title>
    <!--Scripts-->
    <script src="{{asset('js/app.js')}}" defer></script>
    <!--Styles-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
</head>

<body>
    <form class="form-signin" method="POST" action="{{route('login')}}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">ログインフォーム<span data-feather="lock"></span></h1>

        @foreach ($errors->all() as $error)
        <ul class="alert alert-danger">
            <li>{{$error}}</li>
        </ul>
        @endforeach

        <x-alert type="danger" :session="session('danger')"/>
        <x-alert type="success" :session="session('success')"/>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        <button class="btn btn-lg btn-danger btn-block" type="button" onclick="redirectToPage()">新規登録</button>

<script>
    function redirectToPage() {
        // 別のページにリダイレクトする
        window.location.href = 'http://127.0.0.1:8002/new';
    }
</script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script>
            // https://github.com/feathericons/feather
            feather.replace();

            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
</body>
</html>