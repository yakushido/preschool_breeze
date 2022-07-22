<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'cloth_id',
        'size_id',
        'user_id'
    ];

    public function cloth()
    {
        return $this->belongsTo('App\Models\Cloth');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
