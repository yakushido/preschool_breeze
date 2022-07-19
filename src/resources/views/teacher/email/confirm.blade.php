<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
      <h2 class="">メール送信フォーム</h2>
      <form method="post" action="/teacher/mail/send">
        @csrf
        <div>
          <input type="hidden" name="name" value="{{ $name }}">
          <p>名前：<br>{{ $name }}</p>
        </div>
        <div>
          <input type="hidden" name="email" value="{{ $email }}">
          <p>宛先：<br>{{ $email }}</p>
        </div>
        <div>
          <input type="hidden" name="body" value="{{ $body }}">
          <p>本文：<br>{{ $body }}</p>
        </div>
        <button type="submit">送信</button>
      </form>
    </div>
</body>
</html>