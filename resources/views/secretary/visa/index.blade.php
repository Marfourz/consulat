@extends('layouts.layout-secretary')

@section('content')

<div class="w-full bg-gray-300">

<div class="px-6 py-8">
    <div class="text-3xl font-bold text-gray-700">Visas</div>
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
    <div class="px-6 py-4">
    {{ $demandes->links() }}
</div>
</div>
</div>

@endsection