<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticalsController extends Controller
{
 public function __construct() {
    $this->middleware('ActionMiddleware')->only(['store','destroy','update']);
 }
    public function index()
    {
        $url = __DIR__.'/articles.json';
     
        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);

        return view('allArticles',["listArticles" => $listArticles]);
    }

    public function create()
    {
        return view('addArticle');
    }

    public function store(Request $request)
    {        
        $name = $request->name;
        $title = $request->title;
        $body = $request->body;
        
        $url = __DIR__.'/articles.json';

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);

        $les_input = ['articleId' => count($listArticles)+1, 'name' => $name ,'title' => $title, 'body' => $body];

        array_push($listArticles,$les_input);
        file_put_contents($url, json_encode($listArticles));
    
        return redirect(route('articles.index'));
    }

    public function show($id)
    {
        $url = __DIR__.'/articles.json';

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);

        foreach($listArticles as $key) {
            if ($key->articleId == $id) {
                return view('showArticle',["article" => $key]);
            }
        }
    }

    public function edit($id)
    {
        $url = __DIR__.'/articles.json';

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);

        foreach($listArticles as $key) {
            if ($key->articleId == $id) {
                return view('editArticle',["article" => $key]);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $title = $request->title;
        $body = $request->body;
        
        $url = __DIR__.'/articles.json';

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);

        foreach($listArticles as $key) {
            if ($key->articleId == $id) {

                $key->name = $name;
                $key->title = $title;
                $key->body = $body;

            }
        }
    
        file_put_contents($url, json_encode($listArticles));
        return redirect(route('articles.index'));
    }


    public function destroy(Request $request,$id)
    {
        $url = __DIR__.'/articles.json';

        $uri = $request->path();

        $articles= file_get_contents($url);
        $listArticles = json_decode($articles);

        foreach($listArticles as $key) {
            if ($key->articleId == $id) {
                unset($listArticles[array_search($key, $listArticles)]);
            }
        }
        file_put_contents($url, json_encode($listArticles));

        return redirect(route('articles.index'));
    }
}
