<?php

namespace App\Http\Controllers;

use App\Models\Product;


class ProductHintsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke()
    {
        $a = Product::all();
        //$jsonContents=json_encode($a, JSON_UNESCAPED_UNICODE);      
// get the q parameter from URL

$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
    if ($q !== "") {
        
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name['name'], 0, $len))) {
                if ($hint === "") {
                    $hint = $name['name'];
                } else {
                    $hint .= ", $name[name]";
                }
            }
        }
    }

// Output "no suggestion" if no hint was found or output correct values

$jsonHints = explode(", ", $hint);
//переберем два массива $jsonHints и $contents при условии($product['name'] ==$name)
//добавляем данные $product(id,name,carb и т.д.)в новый массив $arrHints

$arrHints = array();
foreach($a as $product){
	foreach($jsonHints as $name){
		if($product['name'] ==$name){
			$arrHints[] = $product;
			break;
		}
	}
}
//и полученный массив переведем в json формат для работы с ним в js
$jsonHints = json_encode($arrHints, JSON_UNESCAPED_UNICODE);

//echo count($arrHints) == 0 ? "no suggestion" : print($jsonHints);
echo $jsonHints; 

    }

   
}
