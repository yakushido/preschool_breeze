@extends('admin.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
  <div class="flex">

    <div class="teacher_list">
      <h3>教員一覧</h3>
      <table>
        <tr>
          <th>名前</th>
          <th>担当クラス</th>
          <th>メールアドレス</th>
        </tr>
        @foreach($teachers as $teacher)
          <tr>
            <td><a href="/admin/detail/{{ $teacher['id'] }}">{{ $teacher['name'] }}</a></td>
            <td>{{ $teacher['team']['name'] }}</td>
            <td>{{ $teacher['email'] }}</td>
            <td class="teacher_delete">
              <form action="{{ route('admin.delete') }}" method='POST'>
              @csrf
                <input type="text" name="id" value="{{ $teacher['id'] }}" hidden>
                <button class="delete_btn">削除</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>

    <div class="teacher_add">
      <h3>教員の追加</h3>
      <form action="{{ route('admin.add') }}" method="POST">
      @csrf
        <div>
          <label>名前：</label>
          <input type="text" name="name">
        </div>
        <div>
          <label>担当クラス：</label>
          <select name="team_id">
            @foreach($team_lists as $team_list)
              <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>メールアドレス：</label>
          <input type="email" name="email">
        </div>
        <div>
          <label>パスワード：</label>
          <input type="text" name="password">
        </div>
        <div class="add_btn">
          <button>追加</button>
        </div>
      </form>
    </div>

  </div>
@endsection