<div>
    <form wire:submit.prevent="render" method="GET">
        @csrf
        <div>
            <label>種類：</label>
            <select wire:model.lazy="cloth">
                @foreach($cloth_lists as $cloth_list)
                <option value="{{ $cloth_list['id'] }}">{{ $cloth_list['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>サイズ：</label>
            <select wire:model.lazy="size">
                @foreach($size_lists as $size_list)
                <option value="{{ $size_list['id'] }}">{{ $size_list['name'] }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <div>
            @foreach($posts as $post)
            <table>
                <tr>
                    <th>種類</th>
                    <th>サイズ</th>
                    <th>金額</th>
                </tr>
                <tr>
                    <td>{{ $post['cloth']['name'] }}</td>
                    <td>{{ $post['size']['name'] }}</td>
                    <td>{{ $post['price'] }}</td>
                    <td>
                        <form action="{{ route('user.shop.cart') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $post['id'] }}" hidden>
                            <button type="submit">カートに追加</button>
                        </form>
                    </td>
                </tr>
            </table>
            @endforeach
    </div>
</div>
