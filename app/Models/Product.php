<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    
    use HasFactory;
    protected $table = 'products';
    
    protected $guarded = [];
    //метод для связывания многих ко многим определяет сколько product и какие
    //атрубуты связаны с post
    public function post(){
        return $this->belongsToMany(Product::class, 'post_products',  'product_id', 'post_id');
    }

}
