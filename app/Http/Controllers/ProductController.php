<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index () {
     
        $products = Product::all();
        //отсортируем массив полученный из БД по алфавиту*******
        $sorted = DB::table('products')
                ->orderBy('name', 'asc')
                ->simplePaginate(5);
        //************* */
        $categories = Category::all();
        
        //dd($Products); дампит переменную и останавливает скрипт
        //методом view(): из директории /viev первый аргумент   <file>, второй - метод compact()c  аргументом в виде переменной без $ строка 12
    return view('product.index', compact('sorted', 'categories', 'products', ));
    } 


    public function create () {
        $products = Product::all();
        $categories = Category::all();
        
        return view('product.create', compact('products','categories'));  
        
        
    }
    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'fat'=>'required',
            'prot'=>'required',
            'carb'=>'required',
            'G'=>'',
            'category_id'=>'required'
        ]);
        
        //Product::create($data);
        //запись в бд уникальных полей по ключам указанным в первом массиве
        Product::firstOrCreate(['name'=>$data['name']],
        $data);

        return redirect()->route('product.index');
    }
    public function show($id)
    {
        $products = Product::all();
       
        $product = Product::FindOrFail($id);
      
        $categories = Category::all();
        return view('product.show', compact('product', 'categories', 'id'));
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
    public function  edit(Product $product) 
    {
        $categories = Category::all();
        //dd($categories);
        return view('product.edit', compact('product','categories'));

    }
    public function update (Product $product)
    {
        $data = request()->validate([
            'name'=>'string',
            'fat'=>'',
            'prot'=>'',
            'carb'=>'',
            'G'=>'',
            'category_id'=>'',
        ]);
        $product->update($data);
        return redirect()->route('product.index', $product->id);
        
    }
    public function destroy(Product $product)
    {
        
        $product->destroy($product->id);
        return redirect()->route('product.index');

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
