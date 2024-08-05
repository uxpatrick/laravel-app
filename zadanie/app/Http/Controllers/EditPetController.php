<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EditPetController extends Controller
{
    public function edit(Request $request) {
        $id = $request['petID'];
        $newName = $request['petName'];
        $newStatus = $request['petStatus'];


        if($id =='' || $newName ==''){
            $response = 'Błąd! Wykryto puste pole';
        }
        else
        {
            $url = "https://petstore.swagger.io/v2/pet/";
            $json = <<<JSON
            {
                "id": "$id",
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
                "status": "$newStatus"
            }
            JSON;
            $data = json_decode($json);

            $response = Http::put($url, $data);
            if ($response->successful()){
                $response = $response->json();
                $response = 'Pomyslnie zedytowano zwierzaka ID: '.$response['id'];
            }
            else {
                $response = 'Nieudana próba edycji!';
            }
        }
        return view('index', ['editResult' => $response]);
    }
}