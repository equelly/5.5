<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index () {

        //dd('article');
     
        $articles = Articles::paginate(5);
       
        //************* */
       
        foreach($articles as $article){
        
        $cut_articles []= array(
            'id'=>$article['id'],
            'title'=> $article['title'],
            'content'=> Str::of($article['content'])->limit(25) 
        ); 
        }
        //dd($articles);
        $categories = Category::all();
        
        //dd($Products); дампит переменную и останавливает скрипт
        //методом view(): из директории /viev первый аргумент   <file>, второй - метод compact()c  аргументом в виде переменной без $ строка 12
    return view('article.index', compact('categories', 'articles', 'cut_articles'));
    } 


    public function create () {
        $articles = Articles::all();
        $categories = Category::all();
        
        return view('article.create', compact('articles','categories'));  
        
        
    }
    public function store()
    {
      
        $data = request()->validate([
            'title'=>'required',
            'content'=>'required',
            
        ]);
       

        Articles::create($data);
        return redirect()->route('articles.index');
    }
    public function show($id)
    {
        $products = Product::all();
       
        $article = Articles::FindOrFail($id);
      
        $categories = Category::all();
        return view('article.show', compact('article', 'categories', 'id'));
    }
    public function showByCategory($id)
    {
        //
        
        //$categories = Category::all();
        
        $product_cat = Product::where('category_id',$id)->get();
       //dd($product_cat);
        
//$products = Product::all();
        //$posts = Post::all();
        //$product = Product::FindOrFail($id);
        $category = Category::FindOrFail($id);
        //dd($product->category_id);
        
        return view('product.showByCategory', compact('product_cat', 'id', 'category'));
    }
    /*helper класса Product сокращает запись при условии в роуте и функции записи равны {<Product>}=$Product
    public function show(Product $product)
    {
                dd($product);
    }*/
    public function  edit(Articles $article) 
    {
        $categories = Category::all();
        //dd($categories);
        return view('article.edit', compact('article','categories'));

    }
    public function update (Articles $article)
    {
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
        ]);
        $article->update($data);
        return redirect()->route('articles.index', $article->id);
        
    }
    public function destroy(Articles $article)
    {
        
        $article->destroy($article->id);
        return redirect()->route('articles.index');

    }
    public function delete()
    {
//если удаляем данные
        //$Product = Product::find(5);
        
        //$Product->delete();
//для восстановления прописываем softDelete() в функции up
//пример восстановления ранее удаленного атрибута(поля) зарезервированными методами
        $product = Product::withTrashed()->find(5);
        $product->restore();

        echo 'удалено: '.$product['updated_at'].'успешно!';
    }
//избежать дублирования по каким-либо атрибутам при добавлении  
//аргументы два массива сравнивает ключевые атрибуты первого с БД
//если совпадают не добавляет для наглядности выводит dump
    //firstOrCreate
    //updateOrCreate
    
public function firstOrCreate()
    {
    $product  = Product::FirstOrCreate([
    'title' => '3some title Product',
],
 [
    'title' => '33some title Product',
    'content' => 'another #3some interesting text',
    'image' => 'another picture',
    'likes'=> 500,
    'is_published' => 0,
]);
dump($product->content);
}
//проверяет массив с ключевыми атрибутами совпадают -обновляет, нет записывает
public function updateOrCreate()
    {
    $product  = Product::updateOrCreate([
    'title' => 'title Product',
    'content' => 'another old interesting text',
],
 [
    'title' => 'new Product',
    'content' => 'another new interesting text',
    'image' => 'another new 20picture',
    'likes'=> 500,
    'is_published' => 0,
]);
dd($product->content);
}

}
