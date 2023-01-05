<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfficherController extends Controller
{
    public function __construct() {
        $this->middleware('ActionMiddleware')->only(['store','destroy','update']);
    }
    public function index()
    {
        $url = __DIR__.'/string.json';
        $les_donner_de_fichier= file_get_contents($url);
        $list = json_decode($les_donner_de_fichier);
        return view('share',["list" => $list]);
    }
    public function store(Request $request){

        $les_inputs = $request->only(['name', 'poste', 'description']);
    
        $url = __DIR__.'/string.json';
        $les_donner_de_fichier = json_decode(file_get_contents($url), true);
    
        $les_inputs['id'] = uniqid();
    
        array_push($les_donner_de_fichier,$les_inputs);
        file_put_contents($url, json_encode($les_donner_de_fichier));
    
        return redirect(route('posts.index'));
    }

    public function destroy($id){
        $url = __DIR__.'/string.json';
        $list = json_decode(file_get_contents($url) , true);
    
        foreach($list as $key) {
            if ($key['id'] == $id) {
                unset($list[array_search($key, $list)]);
            }
        }
        file_put_contents($url, json_encode($list));
    
        return redirect(route('posts.index'));
    }

    public function edit($id){
        $url = __DIR__.'/string.json';

    $fichier= file_get_contents($url);
    $list = json_decode($fichier );

    foreach($list as $key) {
        if ($key->id == $id) {
            return view("modifier",["list"=> $key]);
        }
    }
    }
    public function update($id,Request $request){
        $les_modification = $request->only(['name', 'poste', 'description']);
    $url = __DIR__.'/string.json';

    $fichier= file_get_contents($url);
    $list = json_decode($fichier );

    foreach($list as $key) {
        if ($key->id == $id) {
            $key->name = $les_modification['name'];
            $key->poste = $les_modification['poste'];
            $key->description = $les_modification['description'];
        }
    }

    file_put_contents($url, json_encode($list));
    return redirect(route('posts.index'));
    }
}