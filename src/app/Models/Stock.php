<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'cloth_id',
        'size_id',
        'price'
    ];

    public function cloth()
    {
        return $this->belongsTo('App\Models\Cloth');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
