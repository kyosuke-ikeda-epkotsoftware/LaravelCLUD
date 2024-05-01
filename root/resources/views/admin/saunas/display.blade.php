<!DOCTYPE html>
<html>
<head>
    <title>行ったことあるサウナ</title>
</head>
<body>
    <div>
        <h3>施設名: {{ $sauna->name }}</h3>
        <p>水風呂: {{ $sauna->bath }}</p>
        <p>サウナ: {{$sauna->sauna}}</p>
        <p>外気浴: {{$sauna->outdoor}}</p>
        <p>総合評価: {{$sauna->evaluation}}</p>
        <p>コメント: {{$sauna->comment}}</p>
        <img src="{{asset('storage/'.$sauna->img_path) }}" width=45%>
    </div>
</body>
</html>