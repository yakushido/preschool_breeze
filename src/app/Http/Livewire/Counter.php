<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $cnt = 1;
    public function render()
    {
        return view('livewire.counter');
    }
    public function add()
    {
        $this->cnt++;
    }
    public function del()
    {
        if ($this->cnt > 1) {
            $this->cnt--;
        }
    }
}
