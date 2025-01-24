@extends('layouts.layout')

@section('content')
    <div class="flex flex-col items-center w-screen md:p-16 p-4">
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
                    @foreach ($demandes as $demande)
                    <tr class="text-gray-600 border-b-2">
                        <td class="p-4">{{$demande->id}}</td>
                        <td>
                            <div>
                                
                                <div class="text-gray-700">{{$demande->type()}}</div>
                            </div>
                        </td>
                        <td>
                        <div class="text-gray-700">{{ Carbon\Carbon::create($demande->created_at)->locale('fr_FR')->diffForHumans() }}</div>
                        </td>
                        <td>
                            @if($demande->status() == "Accepté")
                            <div style="width:fit-content" class="bg-green-300 text-xs px-2 text-green-900 font-bold rounded-full">
                                {{ $demande->status() }}
                            </div>
                            @elseif($demande->status() == "Rejeté")
                            <div style="width:fit-content" class="bg-red-300 text-xs px-2 text-red-900 font-bold rounded-full">
                                {{ $demande->status() }}
                            </div>
                            @else
                            <div style="width:fit-content" class="bg-yellow-300 text-xs px-2 text-yellow-900 font-bold rounded-full">
                                {{ $demande->status() }}
                            </div>
                            @endif
                        </td>
                        
                        <td>
                            @if($demande->type() == 'Visa')
                            <a href="{{route('citizen.visa.show',$demande->id)}}" class="text-blue-700 font-bold">Consulter</a>
                            @elseif($demande->type() == "CarteConsulaire")
                            <a href="{{route('citizen.carteConsulaire.show',$demande->id)}}" class="text-blue-700 font-bold">Consulter</a>
                            @else
                            <a href="{{route('citizen.laissezPasser.show',$demande->id)}}" class="text-blue-700 font-bold">Consulter</a>
                            @endif
                        </td>
        
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
