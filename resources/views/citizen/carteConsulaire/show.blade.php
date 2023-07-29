@extends('layouts.layout')

@section('content')
<div class="w-full p-16">
    <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
        <div>Détail de la demande de carte consulaire</div>

        
    </div>

    @include('citizen.carteConsulaire.includes.decision',['demande'=>$demande])
    
    @include('citizen.carteConsulaire.includes.detail',['demande'=>$demande])

  
</div>
@endsection

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