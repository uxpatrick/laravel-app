<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        * {
            font-family: Consolas;
        }
        input[type=text]{
            width:200px;
        }
    </style>
</head>
<body>
    <div id="container">

         <!-- WYSZUKIWANIE ZWIERZAKOW -->

        <h1>Wyszukiwarka zwierząt</h1>
        <form method="GET" action="/search/">
            <label>
                Wprowadź ID zwierzaka do wyświetlenia: 
                <input name=id placeholder="np. 22">
                <button onclick="changeURL()">Szukaj</button>
            </label>
            @if(isset($response['name']) && isset($response['status']))
                <hr>    
                Znaleziony zwierzak: 
                {{$response['name']}}
                <br>
                Status zwierzaka: 
                {{$response['status']}}
            @elseif(isset($response) && !isset($response['status']))
                <hr>    
                {{$response}}
            @endif
        </form>
        
        <!-- DODAWANIE ZWIERZAKOW -->

        <h1>Dodaj zwierzątko</h1>
        <form method="POST">
            @csrf
            @method('POST')
            <input type=text name=petName placeholder="Nazwa">
            Status: 
            <select name=petStatus>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
            <input type=submit value=Dodaj>
        </form>
        @if(isset($addingResult['id']) && isset($addingResult['name']))
            <hr>    
            Dodany zwierzak: 
            ID: {{$addingResult['id']}}
            | Nazwa: {{$addingResult['name']}}
        @elseif(isset($addingResult) && !isset($response['id']))
            <hr>    
            {{$addingResult}}
        @endif

        <!-- USUWANIE -->

        <h1>Usuń zwierzątko</h1>
        
        <form method="POST">
            @csrf
            @method('DELETE')
            <input type=text name=petID placeholder="ID zwierzaka do usunięcia">
            <input type=submit value=USUŃ>
        </form>
        @if(isset($deletingResult))
            <hr>
            {{$deletingResult}}
        @endif

        <!-- EDYCJA -->

        <h1>Edytuj zwierzątko</h1>
         <form method="POST">
            @csrf
            @method('PUT')
            <input type=text name=petID placeholder="ID zwierzaka do edycji">
            <input type=text name=petName placeholder="Nowa nazwa">
            <br>
            Nowy status: 
            <select name=petStatus>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
            <input type=submit value=Edytuj>
        </form>
        @if(isset($editResult))
            <hr>
            {{$editResult}}
        @endif
    </div>
</body>
</html>