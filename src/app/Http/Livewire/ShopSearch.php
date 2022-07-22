<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
use App\Models\Cloth;
use App\Models\Size;

class ShopSearch extends Component
{
    public $cloth = '';
    public $size = '';
    public $cloth_lists = [];
    public $size_lists = [];
    public $posts = [];

    public function mount()
    {
        $this->cloth_lists = Cloth::all();
        $this->size_lists = Size::all();
    }

    public function render()
    {
        $this->search();

        return view('livewire.shop-search', ['cloth_lists','size_lists','posts']);
    }

    public function search()
    {
        if($this->cloth || $this->size){
            $this->posts = Stock::where('cloth_id', $this->cloth)->Where('size_id', $this->size)->get();
        }
    }
}
