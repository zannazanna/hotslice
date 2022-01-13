<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function create(Request $req){
        $newPizza = json_decode($req->getContent());
        $pizza = new Pizza();
        $pizza -> name = $newPizza->name;
        $pizza -> foto = $newPizza->foto;
        $pizza -> prezzo = $newPizza->prezzo;
        $pizza -> impasto = $newPizza->impasto;
        $pizza -> allergeni = $newPizza->allergeni;
        $pizza -> descrizione = $newPizza->descrizione;
        $pizza -> save();
        return response()->json("create", 200);
    }

    public function allPizza(){
        return Pizza::orderBy("prezzo","ASC")->get();
    }

    public function pizza($id){
        return Pizza::where("id",$id)->first();
    }

    public function modify(Request $req,$id){
        $newPizza = json_decode($req->getContent());

        $pizza = Pizza::where("id",$id)->first();
        $pizza -> name = $newPizza->name;
        $pizza -> foto = $newPizza->foto;
        $pizza -> prezzo = $newPizza->prezzo;
        $pizza -> impasto = $newPizza->impasto;
        $pizza -> allergeni = $newPizza->allergeni;
        $pizza -> descrizione = $newPizza->descrizione;
        $pizza -> save();
        return response()->json("modify pizza", 200);
    }

    public function delete($id){
        return Pizza::destroy($id);
    }
}
