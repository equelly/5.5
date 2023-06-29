<?php
//для многометодных контроллеров

/* 
namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Product;
use App\Models\PostProduct;

class PostController extends Controller
{
    public function index () {
        //$post = Post::find(1);// обращаемся через класс Post к методу find,который ищет по (id)
        //dd($post);
        $posts = Post::all();
        //dd($posts); дампит переменную и останавливает скрипт
        //методом view(): из директории /viev первый аргумент   <file>, второй - метод compact()c  аргументом в виде переменной без $ строка 12
        //$product = Product::find(2);
        //dd($post->product);
        
        return view('post.index', compact('posts'));
    } 
    public function create () {
        $posts = Post::all();
        $products = Product::all();
        return view('post.create', compact('posts', 'products'));  
        
        
    }
    public function store()
    {
        $data = request()->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|string',
            'products'=>'',
        ]);
        //products - атрибут (поле) которого нет в таблице post поэтому его нужно 
        //выделить из переменной $data поле products сохранить эти данные в $products
        $products = $data['products'];
        //затем удаляем это поле из $data
        unset($data['products']);
        //dd($data, $products);
        //сохраним результат работы метода create класса Post в переменной $post
        $post = Post::create($data);
    
    //этот скрипт пошагового выполнения добавления в БД с маркировкой времени
        //циклом по массиву $products==============
        foreach($products as $product){
            //обращаемся к классу PostProduct
            PostProduct::firstOrCreate([
                'product_id'=>$product,
                'post_id'=>$post->id,
            ]);
        }
//================================================== 
        
        //метод laravel attach позволяет сократить запись, но без маркировки времени 
        //к этому посту($post) через метод класса Post  product привяжет методом attach данные из $products
       $post->product()->attach($products);
        return redirect()->route('post.index');
    }
    public function show($id)
    {
        $posts = Post::all();
        $post = Post::FindOrFail($id);
        return view('post.show', compact('post','posts'));
    }
    /*helper класса Post сокращает запись при условии в роуте и функции записи равны {<post>}=$post
    public function show(Post $post)
    {
                dd($post);
    }
    public function  edit(Post $post) 
    {
        $posts = Post::all();
        $products = Product::all();
        $postProducts = PostProduct::all();
        //dd($post);
        return view('post.edit', compact('postProducts','posts', 'products', 'post'));

    }
    public function update (Post $post)
    {
        $data = request()->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|string',
            'products'=>'',

        ]);
        //применяем тот же подход что и  для создания
        $products = $data['products'];
        unset($data['products']);
        $post->update($data);
        //только метод attach заменим sync
        $post->product()->sync($products);
        
        return redirect()->route('post.show', $post->id);
        
    }
    public function destroy(Post $post)
    {
        
        $post->destroy($post->id);
        return redirect()->route('post.index');

    }
    
//избежать дублирования по каким-либо атрибутам при добавлении  
//аргументы два массива сравнивает ключевые атрибуты первого с БД
//если совпадают не добавляет для наглядности выводит dump
    //firstOrCreate
    //updateOrCreate
    
public function firstOrCreate()
    {
    $post  = Post::FirstOrCreate([
    'title' => '3some title post',
],
 [
    'title' => '33some title post',
    'content' => 'another #3some interesting text',
    'image' => 'another picture',
    'likes'=> 500,
    'is_published' => 0,
]);
dump($post->content);
}
//проверяет массив с ключевыми атрибутами совпадают -обновляет, нет записывает
public function updateOrCreate()
    {
    $post  = Post::updateOrCreate([
    'title' => 'title post',
    'content' => 'another old interesting text',
],
 [
    'title' => 'new post',
    'content' => 'another new interesting text',
    'image' => 'another new 20picture',
    'likes'=> 500,
    'is_published' => 0,
]);
dd($post->content);
}

}
/*