<?php

namespace App\Services\Post;

use App\Models\Post;


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
    //применяем тот же подход что и  для создания
    //dd($data);
    $products = $data['products'];
    unset($data['products']);
    $post->update($data);
    //только метод attach заменим sync
    $post->product()->sync($products);
}
public function mydata(){
  return  "done";
} 
}
