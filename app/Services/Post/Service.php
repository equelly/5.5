<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\PostProduct;
use Illuminate\Support\Facades\DB;

class Service 
{
public function store($data)
{
  
  //выделяем в отдельный массив массив продуктов привязанных к рецeпту(post)
    $products = $data['products'];
  //и удаляем его из массива data, т.к. в валидации нет для записи products(a в БД поля)    
    unset($data['products']);
    //без проверки на уникальность по атрибуту 'title'----------
    //$post = Post::create($data);
   //-----------------------------------------------------------
   //с проверкой на уникальность, если в БД eсть такой атрибут(поле 'title'), то добавлен не будет
    $post = Post::firstOrCreate([
        'title'=>$data['title']
      ],
    [
      'title'=>$data['title'],
      'content'=>$data['content'],
      'image'=>$data['image'],
    ]);

  
    $post->title;
    //dd($post);
    $post->product()->attach($products);
  
}

public function update($post, $data)
{
      //dd($post);
      // удалим старые записи из БД 
      DB::table('post_products')->where('post_id', '=', $post->id)->delete();
      
      if(isset($data['products']) && count($data['products']) != null){
    // dd($data['products']);
      $products = $data['products'];
        //a из массива $data удалим
          unset($data['products']);  
          foreach($products as $product){
            PostProduct::firstOrCreate([
            'post_id'=>$post->id,
            'product_id'=>$product,
    
            ]);
          }
        }
        $post->update($data);
          
    
        return redirect()->route('post.index');
}
public function mydata(){
  return  "done";
} 
}
