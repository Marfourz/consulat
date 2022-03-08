@extends('layouts.layout')

@section('content')
    <div class="flex flex-col items-center w-screen p-16">
    <div class="text-gray-700  text-3xl">
        Liste de vos demandes
    </div>

    <div class="w-full mt-8">
        <table class="w-full bg-white shadow">
            <thead>
                <tr class="text-gray-700 bg-slate-300 border-b-2">
                    <td class="p-4">Numéro de la demande</td>
                    <td>Document demandé</td>
                    <td>Date de la date</td>
                    <td>Statut de la demande</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                    <tr class="text-gray-600 border-b-2">
                        <td class="p-4">Ps00045555555</td>
                        <td>Visa</td>
                        <td>1 février 2022 à 18h</td>
                        <td><div style = "width:fit-content" class="bg-green-400 px-4 py-2 rounded-full text-center text-white mx-4 text-sm"> Validé</div></td>
                        <td>
                            <button class="bg-green-600 text-white px-4 py-2 rounded text-sm">Détails</button>
                        </td>
                    </tr>
                    <tr class="text-gray-600 border-b-2">
                        <td class="p-4">RL12233SDS</td>
                        <td>Carte consulaire</td>
                        <td>1 Janvier 2022 à 17h</td>
                        <td><div style = "width:fit-content" class="bg-yellow-300 px-4 py-2 rounded-full width-64 text-center text-white mx-4 text-sm"> En cours</div></td>
                        <td>
                            <button class="bg-green-600 text-white px-4 py-2 text-sm rounded">Détails</button>
                        </td>
                    </tr>
                    <tr class="text-gray-600 border-b-2">
                        <td class="p-4">RL12233AADS</td>
                        <td>Laissez passer</td>
                        <td>1 Janvier 2022 à 17h</td>
                        <td><div style = "width:fit-content" class="bg-red-300 px-4 py-2 rounded-full width-64 text-center text-white mx-4 text-sm"> Rejeté</div></td>
                        <td>
                            <button class="bg-green-600 text-white px-4 py-2 text-sm rounded">Détails</button>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    </div>
    
@endsection