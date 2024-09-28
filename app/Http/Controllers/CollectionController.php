<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
         $collections = Collection::all();
         return response()->json($collections);
    }
    public function show($id){
        $collection = Collection::find($id);
        if (!empty($collection)){
        return response()->json($collection);
        } else
        {
            return response()->json(["message"=>"Collection not found"],404);
        }
   
    }
    public function infopixels($id){
        $collection  = Collection::find($id);
        if (!empty($collection)){ 
            $infopixels = $collection->infopixels();
            if (!empty($infopixels)){
            return response()->json(["infopixels",$collection->infopixels()->get()]);
        } else
        {
            return response()->json(["message"=>"Collection contains no infopixels"],404);
        }
        }else
        {
            return response()->json(["message"=>"Collection not found"],404);
        }
   
    }
}
