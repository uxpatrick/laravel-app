<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DisplayPetController extends Controller
{
    public function index(Request $request) {
        $id = $request['id'];
        if($id==''){
            $response = 'Błąd, puste pole!';
        }
        elseif(!is_numeric($id)){
            $response = 'Błąd, wprowadź liczbe.. NIE TEKST!';
        }
        else{
            $url = "https://petstore.swagger.io/v2/pet/".$id;
            $response = Http::get($url);
            if ($response->successful()){
                $response = $response->json();
            }
            else {
                $response = 'Nie znaleziono';
            }
        }
        return view('index', ['response' => $response]);
    }
}
