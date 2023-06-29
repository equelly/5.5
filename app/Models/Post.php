<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    //функция для трейта Trait\Filterable(не находит?... прописал в Post)
    public function scopeFilter(Builder $builder, FilterInterface $filter) 
    {
        $filter->apply($builder);

        return $builder;
    }
    //хотя таблица в БД создавалась миграцией вместе с моделью, но лучше указать явно
    //protected $table = 'posts';
    //разрешение на редактирование атрибуров в БД([] или = false)
    protected $guarded = [];

    //метод для связывания один ко многим

    public function category(){
    return $this->belongsTo(Category::class, `category_id`,`id`);
}
    public function user(){
        return $this->belongsTo(User::class, `user_id`,`id`);
    }
//метод для связывания многие ко многим и определяет сколько post и какие
//атрубуты связаны с product,т.к. отношения создаем для posts табл. post_product первым аргументом post_id

    public function product(){
        return $this->belongsToMany(Product::class, 'post_products','post_id','product_id');
    }
}
