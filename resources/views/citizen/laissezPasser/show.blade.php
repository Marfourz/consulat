@extends('layouts.layout')

@section('content')
<div class="w-full md:p-12 p-4">
    <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
        <div>Détail de la demande de laissez passer</div>
    </div>

    @include('citizen.laissezPasser.includes.decision',['demande'=>$demande])
    @include('citizen.laissezPasser.includes.detail',['demande'=>$demande])

  
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