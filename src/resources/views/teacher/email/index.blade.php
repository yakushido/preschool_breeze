<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

    <div class="mail">
      <h2>メール送信フォーム</h2>
      <form method="post" action="/teacher/mail/confirm">
        @csrf
        <div>
          <label>名前（必須）</label>
          <input type="text" name="name" placeholder="名前"  value="{{old('name')}}">
        </div>
        <div>
          <label>宛先（必須）</label>
          <input type="text" name="email" placeholder="宛先"  value="{{old('email')}}">
        </div>
        <div>
          <label>本文</label>
          <textarea name="body" placeholder="本文（100文字まで）をお書きください"  rows="3" >{{old('body')}}</textarea>
        </div>
        <button type="submit">確認</button>
      </form>
    </div>

</body>
</html>