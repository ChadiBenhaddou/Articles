<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function filter(Request $request){
        $name = $request->name;
        $url = __DIR__.'/articles.json';

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);
        $writerArticles = array();

        foreach($listArticles as $key) {
            if ($key->name == $name) {
                array_push($writerArticles,$key);;
            }
        }

        return view('allArticles',["listArticles" => $writerArticles]);
    }
}
