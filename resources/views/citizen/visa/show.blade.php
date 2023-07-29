@extends('layouts.layout')

@section('content')
<div class="w-full p-16">
    <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
        <div>Détail de la demande de visa</div>

        
    </div>
    @include('citizen.visa.includes.decision',['demande'=>$demande])
    
    @include('citizen.visa.includes.detail',['demande'=>$demande])
</div>
@endsection

