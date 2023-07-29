@extends('layouts.layout-secretary')

@section('content')



        @if($demande->type() == 'visa' )
            @include('secretary.visa.detail',['demande'=>$demande])
        @elseif($demande->type() == 'CarteConsulaire')
            @include('secretary.carteConsulaire.detail',['demande'=>$demande])
        @else
            @include('secretary.laissezPasser.detail',['demande'=>$demande])
        @endif
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