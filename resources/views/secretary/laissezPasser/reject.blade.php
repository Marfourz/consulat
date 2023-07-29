@extends('layouts.layout-secretary')

@section('content')

    <div>
        <div class="w-full p-16">
            @if($demande->status() != "Accepté" || $demande->status() != "Rejeté")
            <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
                <div>Demande laissez passer de {{$demande->user->firstname}} {{$demande->user->lastname}}</div>
            </div>
            @endif
        
            <form action="{{route('laissezPasser.reject')}}" method="POST">
                @csrf
                <input type="hidden" name="demandeId" value={{$demande->id}}>
                <div class="text-gray-700 font-bold mb-4 xl">Entrez le motif du rejet</div>
                <textarea required name="comment" id="" cols="30" rows="5" class="w-full rounded-lg border mb-4"></textarea>
                <div class="flex justify-end mb-4">
                    <a href="">
                        <button type="submit" class="bg-red-700 px-4 py-2 text-sm rounded shadow  text-white">
                            Rejeter la demande
                        </button>
                    </a>
                </div>
            </form>
        
        
           
        @include('citizen.laissezPasser.includes.decision',['demande'=>$demande])
        @include('citizen.laissezPasser.includes.detail',['demande'=>$demande])
        
      
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
