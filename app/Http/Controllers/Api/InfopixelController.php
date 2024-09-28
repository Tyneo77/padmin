<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Infopixel;
use Illuminate\Http\Request;

class InfopixelController extends Controller
{
    public function show($id){
        $CI = Collection::find($id)->infopixels()->get();
        $ids = $CI->pluck('infopixel_id');
        $infopixels = Infopixel::whereIn('id',$ids)->get(); 
        if (!empty($ids)){
        return response()->json($infopixels);
        } else
        {
            return response()->json(["message"=>"No Infopixels found"],404);
        }
   
    }//

    public function pivot($id){
        $CI = Collection::find($id)->infopixels()->get();
       
        if (!empty($CI)){
        return response()->json($CI);
        } else
        {
            return response()->json(["message"=>"No Infopixels in this collection"],404);
        }
   
    }//

}
