


@extends('layouts.layout-secretary')

@section('content')
    <div class="w-full p-16">
        {{-- @if($demande->status() != "Accepté" && $demande->status() != "Rejeté")
       
        @endif --}}

        <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
            <div>Détail de la demande de carte consulaire</div>
            <div class="flex space-x-2">
                <a href="{{route('carteConsulaire.preview',$demande->id)}}">
                    <button class="bg-green-700 px-4 py-1 text-sm rounded shadow  text-white">
                        Accepter
                    </button>
                </a>
                
                <a href="{{ route('carteConsulaire.showWithError',$demande->id) }}">
                    <button class="bg-red-700 px-4 py-1 text-sm rounded shadow  text-white">
                        Rejeter
                    </button>
                </a>
                <a href="">
                    <button class="bg-yellow-700 px-4 py-1 text-sm rounded shadow  text-white">
                        Demander des modifications
                    </button>
                </a>
              
               
            </div>
            
        </div>
        @include('citizen.carteConsulaire.includes.decision',['demande'=>$demande])
        @include('citizen.carteConsulaire.includes.detail',['demande'=>$demande])
    </div>

<style>
    table{
        border-collapse: collapse;
        
    }
    td{
        color: rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 12px
    }
</style>
@endsection
