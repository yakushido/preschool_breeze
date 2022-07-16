<div>
    @for($i = 0; $i < $cnt; $i++)
    <p><input type="text" name="test" value=""></p>
    @endfor
    <p><button  wire:click="add">add</button></p>
    <p><button  wire:click="del">del</button></p>
</div>
