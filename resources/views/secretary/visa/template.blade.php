<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <div  class=""  >
            <div class="image">
                <img style="width:75px;height:75px" src="{{ public_path("images/logo.png") }}" alt="">
            </div>  
            <table class="rounded-xl doc">
                <tr>
                    <td>Nom</td> 
                    <td class="td">{{$demande->user->lastname}}</td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td class="td">{{$demande->user->firstname}}</td>
                </tr>
               
                <tr>
                    <td>N°Passport</td>
                    <td class="td">{{$demande->passport_number}}</td>
                </tr>
                <tr>
                    <td>Séjour</td>
                    <td class="td">{{$demande->stay_duration}}</td>
                </tr>
        
                <tr>
                    <td>A compter du</td>
                    <td class="td"> {{$data['entry_at']}}</td>
                </tr>
               
            
                <tr>
                    <td>
                        Jusqu'au : 
                    </td>
                    <td class="td">
                        {{ $data['expiry_at'] }}
                    </td>
                </tr>
            </table>
        </div>
    </center>

 
</body>

<style>

    @page { margin: 0px; border-radius: 5px; padding: 10px }

    body{
        font-size: 12px;
        margin: 0px;
        background-image : url("{{ public_path('images/background.png') }}");
    }

    .td{
        padding-left: 30px
    }
    td
    {
        padding: 5px 12px;
        color:rgba(0,0,0,0.6);
        font-weight: bold
    }
    .image{
        margin: auto;
        width:100%;
        margin-bottom: 10px
    }
    
</style>
</html>