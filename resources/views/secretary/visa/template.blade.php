<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="rounded-xl doc">
        <tr>
            <td  colspan="2 ">
                <div class=" flex justify-center ">
                    <img class="w-32 h-32" src="{{asset('images/logo.png')}}" alt="">
                </div>  
                
            </td>
        </tr>
        <tr>
            <td class="w-1/2">Nom</td>
            <td class="">{{$demande->user->lastname}}</td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td class="">{{$demande->user->firstname}}</td>
        </tr>
       
        <tr>
            <td>N°Passport</td>
            <td class="">{{$demande->passport_number}}</td>
        </tr>
        <tr>
            <td>Séjour</td>
            <td class="">{{$demande->stay_duration}}</td>
        </tr>

        <tr>
            <td>A compter du</td>
            <td class="">{{$demande->entry_at}}</td>
        </tr>
       
    
        <tr>
            <td>
                Jusqu'au : 
            </td>
            <td class="">
                jj
            </td>
        </tr>
    </table>
</body>
</html>