<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostProduct extends Model
{
    use HasFactory;
    //разрешение на добавление и обновление записей в объект класса==
    
    
    protected $guarded = false;
    //=============
    public function product(){
        return $this->belongsToMany(Product::class, 'posts','product_id','id');
    }
}
