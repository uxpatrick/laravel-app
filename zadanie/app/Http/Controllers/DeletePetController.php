<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DeletePetController extends Controller
{
    public function delete(Request $request)
    {
        $id = $request['petID'];
        $url = "https://petstore.swagger.io/v2/pet/".$id;
        $response = Http::delete($url);
    
        if ($response->successful()){
            $response = $response->json();
            $response = 'Usunieto pomyslnie z kodem: '.$response['code'];
        }
        else {
            $response = 'Nieudana próba usunięcia';
        }
        return view('index', ['deletingResult' => $response]);
    }
}
