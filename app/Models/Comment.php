<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;

    use SoftDeletes;
   
    //модель создавалась с привязкой к миграции, но рекомендуется сделать защиту
    protected $table = 'comments';
    protected $guarded = [];

    public function user(){
       
        return $this->belongsTo(User::class, `user_id`,`id`);
    }
}