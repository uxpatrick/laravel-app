<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AddPetController extends Controller
{
    public function add(Request $request) {
        $url = "https://petstore.swagger.io/v2/pet/";
        $newName = $request['petName'];
        $petStatus = $request['petStatus'];
        if($newName == ''){
            $response = 'Błąd! Pusta nazwa!';
        }
        else{
            $json = <<<JSON
            {
                "id": 0,
                "category": {
                    "id": 0,
                    "name": "string"
                },
                "name": "$newName",
                "photoUrls": [
                    "string"
                ],
                "tags": [
                    {
                    "id": 0,
                    "name": "string"
                    }
                ],
                "status": "$petStatus"
            }
            JSON;
    
            $data = json_decode($json);
    
            $response = Http::post($url, $data);
            if ($response->successful()){
                $response = $response->json();
                
            }
            else {
                $response = 'Nieudana próba dodania';
            }
        }
        return view('index', ['addingResult' => $response]);
    }
}
