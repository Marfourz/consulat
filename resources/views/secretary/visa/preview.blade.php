@extends('layouts.layout-secretary')

@section('content')

<div class="w-full flex justify-center">
    <form action="{{route('visa.generate')}}" method="POST" class="flex flex-col  w-1/3  justify-center items-center  p-16">
        @csrf
        <input type="hidden" name="demandeId" value={{$demande->id}}>
        <div class="mb-4 text-xl text-center text-gray-700">
            Prévisualisation du document
        </div>
        
        <table class="rounded-xl doc">
            <tr>
                <td  colspan="2 ">
                    <div class=" flex justify-center ">
                        <img class="w-32 h-32" src="{{asset('images/logo.png')}}" alt="">
                    </div>  
                    
                </td>
            </tr>
            <tr>
                <td class="w-1/2">Nom</td>
                <td class="">{{$demande->user->lastname}}</td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td class="">{{$demande->user->firstname}}</td>
            </tr>
           
            <tr>
                <td>N°Passport</td>
                <td class="">{{$demande->passport_number}}</td>
            </tr>
            <tr>
                <td>Séjour</td>
                <td class="">{{$demande->stay_duration}}</td>
            </tr>
           
            <tr>
                <td>
                    A compter du : 
                </td>
                <td class="">
                    <input value="{{$demande->entry_at}}" name="entry_at" type="date" class="border-2 w-full rounded-md p-1  text-gray-700 focus:outline-none focus:shadow-outline"
                               />
                </td>
            </tr>
    
            <tr>
                <td>
                    Jusqu'au : 
                </td>
                <td class="">
                    <input type="date" name="expiry_at" type="date" class="border-2 w-full rounded-md p-1  text-gray-700 focus:outline-none focus:shadow-outline"
                               />
                </td>
            </tr>
        </table>
       
        <div class="flex justify-end mt-8 w-full space-x-4">
            <button type="reset" class="bg-red-700 px-6 py-2 text-sm rounded shadow  text-white">
                Annuler
            </button>
            <a href="{{route('visa.download',$demande->id)}}">
                <button type="submit" class="bg-green-700 px-6 py-2 text-sm rounded shadow  text-white">
                    Générer
                </button>
            </a>
           
        </div>
    </form>
</div>



<style>
    .doc{
        background-image: linear-gradient(#fed7aa,#d9f99d);        
    }
    td
    {
        padding: 5px 30px;
    }
    
</style>

@endsection