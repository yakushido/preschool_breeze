<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }
}
