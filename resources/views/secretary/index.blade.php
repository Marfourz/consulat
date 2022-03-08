@extends('layouts.layout-secretary')

@section('content')

<div class="w-full bg-gray-300">

<div class="px-6 py-8">
    <div class="text-3xl font-bold text-gray-700">Dashboard</div>
</div>
<div class="flex space-x-2 px-6">
    <div class=" grid grid-cols-3 w-full gap-8">
        <div class="flex space-x-4 bg-white rounded-lg py-6 px-4">
            <div style="width:58px;height:58px" class="rounded-full w-16 h-16 flex items-center justify-center bg-blue-800 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div> 
                <div class="font-bold text-2xl">{{ $totalCarteConsulaire }}</div>
                <div class="text-gray-700">Carte consulaire</div>
            </div>
        </div>

        <div class="flex space-x-4 bg-white rounded-lg py-6 px-4">
            <div style="width:58px;height:58px" class="rounded-full flex items-center justify-center bg-green-700 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <div class="font-bold text-2xl">{{ $totalLaissezPasser }}</div>
                <div class="text-gray-700">Laissez passer</div>
            </div>
        </div>
       

        <div class="flex space-x-4 bg-white rounded-lg py-6 px-4">
            <div style="width:58px;height:58px" class="rounded-full w-16 h-16 flex items-center justify-center bg-yellow-700 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
            </div>
            <div>
                <div class="font-semibold text-2xl">{{ $totalVisa }}</div>
                <div class="text-gray-700">Visa</div>
            </div>
        </div>




    </div>


</div>
<div class="h-full mx-6 my-8 bg-white shadow">
    <table class="w-full rounded-xl text-sm">
        <thead>
            <tr class="bg-gray-100 rounded-t-xl text-gray-700 border-b-2">
                <td class="py-2 px-4">DEMANDEURS</td>
                <td>TYPE DEMANDE</td>
                <td>DATE</td>
                <td>Statut</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $demande)
            <tr class="border-b-2">
                <td class="p-4"> 
                    <div class="flex space-x-4">
                        <div class="rounded-full w-12 h-12 bg-gray-200 flex items-center justify-center">
                            <img src="{{asset('storage/' . $demande->path_picture)}} " alt="aa" class="w-8 h-8"> 
                        </div>
                        <div class="flex flex-col space-y-1">
                            <div> {{ $demande->user->firstname . $demande->user->lastname }}</div>
                            <div class="text-gray-700">{{ $demande->user->email }}</div>
                        </div>
                    </div>
                </td>
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
                    <a href="{{route('visa.show',$demande->id)}}" class="text-blue-700 font-bold">Consulter</a>
                </td>
            </tr>
            @endforeach


            
        </tbody>
    </table>
</div>
</div>

@endsection