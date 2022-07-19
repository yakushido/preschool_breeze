@extends('teacher.layouts.default')
@section('contents')

  <div class="detail">
    <h2>生徒詳細</h2>
    <table>
      <tr>
        <td>名前：</td>
        <td>{{ $user['name'] }}</td>
      </tr>
      <tr>
        <td>性別：</td>
        <td>{{ $user['gender']['name'] }}</td>
      </tr>
      <tr>
        <td>メールアドレス：</td>
        <td>{{ $user['email'] }}</td>
      </tr>
      <tr>
        <td>誕生日：</td>
        <td>{{ $user['birthday'] }}</td>
      </tr>
    </table>
  </div>

@endsection