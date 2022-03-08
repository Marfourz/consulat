<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="page-break-after: always;" ></div>

    <table>
        <tr>
            <td>Nom</td>
            <td>{{$demande->lastname}}</td>
            <td>Prénom</td>
            <td>{{$demande->firstname}}</td>
        </tr>
        <tr>
            <td>Situtation familiale</td>
            <td></td>
        </tr>
        <tr>
            <td>N°Passport</td>
            <td></td>
        </tr>
        <tr>
            <td>Séjour</td>
            <td></td>
        </tr>
        <tr>
            <td>Date d'entrée</td>
            <td></td>
        </tr>
        <tr>
            <td>
                Date d'expiration
            </td>
            <td></td>
        </tr>
    </table>

    <div>
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>
</body>
</html>