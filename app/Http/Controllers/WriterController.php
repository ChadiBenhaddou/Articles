<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function __construct() {
        $this->middleware('ActionMiddleware')->only(['store']);
     }
    public function filter(Request $request){
        $name = $request->name;
        $url = __DIR__.'/articles.json';
        $url2 = __DIR__.'/writers.json';
      

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);
        $writerArticles = array();

        foreach($listArticles as $key) {
            if ($key->name == $name) {
                array_push($writerArticles,$key);
            }if($name == "All"){
                $writerArticles = $listArticles;
            }
        }
        $ws= file_get_contents($url2);
        $listw = json_decode($ws);

        return view('allArticles',["listArticles" => $writerArticles , "writers" => $listw]);
    }

    public function create(){
        $url2 = __DIR__.'/writers.json';

        $ws= file_get_contents($url2);
        $listw = json_decode($ws);

        return view('addWriter',["writers" => $listw]);
    }

    public function store(Request $request){
        $name = $request->name;

        $url = __DIR__.'/articles.json';
        $url2 = __DIR__.'/writers.json';

        $ws= file_get_contents($url2);
        $listw = json_decode($ws);

        $les_input = ['name' => $name];
        if(isset($les_input)){
            array_push($listw,$les_input);
        }

        
        file_put_contents($url2, json_encode($listw));

        return redirect(route('articles.index'));
    }
}
