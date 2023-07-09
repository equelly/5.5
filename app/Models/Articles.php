<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use SoftDeletes;
    use HasFactory;
    //модель создавалась с привязкой к миграции, но рекомендуется сделать защиту
    protected $table = 'articles';
    protected $guarded = [];
}
