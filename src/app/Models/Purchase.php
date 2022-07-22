<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'user_id'
    ];

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
