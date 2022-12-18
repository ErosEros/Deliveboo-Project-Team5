<?php


namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Error;
use App\Restaurant;
use App\Typology;

class FrontendController extends Controller{


    public function index () {
        try {
            $r = Restaurant::with(['dishes', 'typologies'])->get();
            $t = Typology::with(['restaurants'])->get();
            $data = [
                'results' => $r,
                'typologies' => $t,
                'success' => count($r) > 0
            ];
        }catch(Error $e){
            $data = [
                'results' => $e->message,
                'success' => false
            ];
        }

        return response($data);


    }


    public function show($slug) {
         $typologies = Typology::all();
         $data = [];
         foreach($typologies as $typology){
         if ($typology->slug == $slug){
           foreach($typology->restaurants as $item){
               array_push($data,$item);
           }
         }
        }


            return response($data);


    }
}







?>
