<?php

namespace App\Http\Controllers\Post\Comment;



use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;




class StoreController extends BaseController
{
   public function __invoke(Post $post, StoreRequest $request)
   { 
    $data = $request->validated(); 

    //в $data приходят результаты запроса из textaria 'message' - $request и валидируется методом validated()
    //а в таблице БД 'comments' есть поля 'user_id' и 'post_id' для связи (один ко многим) с пользователями и рецептами по их 'id'
    //в $data добавим id пользователя, который вошел в приложение с помощью хелпера auth() и id рецепта из аргумента метода класса StoreController
    $data['user_id'] = auth()->user()->id;
    $data['post_id'] = $post->id;
    //после формирования массива $data обращаемся к классу Comment и метод create добавит значения этого массива в таблицу  'comments' БД где ключи соответствуют полям 
    Comment::create($data);
   
    

    return redirect()->route('post.show', $post->id);

    
    }
   
}