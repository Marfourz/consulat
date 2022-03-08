@extends('layouts.layout-secretary')

@section('content')
    <div class="w-full p-16">
        @if($demande->status() != "Accepté")
        <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
            <div>Détail de la demande de visa</div>

            <div class="flex space-x-2">
                <a href="{{route('visa.preview',$demande->id)}}">
                    <button class="bg-green-700 px-4 py-1 text-sm rounded shadow  text-white">
                        Accepter
                    </button>
                </a>
                
                <a href="">
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
        @endif

        <form action="{{route('visa.reject')}}" method="POST">
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

    
        @foreach($demande->traitements as $traitement)
        @if($traitement->status == 'accept')
        
        <div class="flex mb-4 bg-green-700 text-white rounded-lg px-4 py-3 justify-between">
            <div>
                Demande accepté et document généré avec succès
            </div>
            <div>
                <a href="{{asset($traitement->document)}}"><button class="bg-white shadow-xl py-1 px-2 rounded text-gray-700 font-bold">Télécharger le visa</button></a>
                
            </div>
            
        </div>
        

        @endif

        @endforeach

        <div class="w-full rounded-lg border-2 px-4 py-3 bg-gray-100 mb-4">
            Nouvellement effectuée
        </div>

        <div>
            <table class="table-auto bg-white w-full border-collapse">
                <tbody>
                    <tr class="bg-gray-100">
                        <td class="w-1/2">
                            Nom du demandeur
                        </td>
                        <td class="px-6 font-bold">
                            {{ $demande->user->lastname }}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Prénom du demandeur
                        </td>
                        <td class="px-6 font-bold">
                            {{ $demande->user->firstname }}
                        </td>
                        
                    </tr>


                    <tr class="bg-gray-100">
                        <td>
                            Situation familiale
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->family_status }}
                        </td>
                        
                    </tr>
        
                    

                    <tr class="">
                        <td>
                            Nombre d'enfants
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->number_of_children }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Age
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->age}}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Domicile habituel
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->usual_residence }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Profession
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->profession }}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Numéro du passport
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->passport_number }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Date d'obtention
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->passport_created_at }}
                        </td>
                        
                    </tr>


                    <tr class="">
                        <td>
                            Lieu d'obtention
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->passport_created_by }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Valide jusqu'au
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->passport_expiry }}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Durée des arrêts (jours)
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->stop_duration }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Durrée du séjour (jours)
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->stay_duration }}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Motif détallé du voyage
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->travel_reason }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Date d'entrée
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->entry_at }}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Attaché familiale en cote d'ivoire
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->has_relatives_in_ivoir == '1' ? 'Oui' : 'Non'}}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Indication de vos adresses exactes en (rue et N°) en Côte d'Ivoire pendant votre séjour
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->ivoir_adress_during_staying }}
                        </td>
                        
                    </tr>

                    <tr class="">
                        <td>
                            Comptez-vous établir un commerce en cote d'ivoire ?
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->etablish_commerce_in_ivoir == '1' ? "Oui" : "Non" }}
                        </td>
                        
                    </tr>

                    <tr class="bg-gray-100">
                        <td>
                            Destination après la cote d'ivoire
                        </td>
                        <td class="font-bold px-6">
                            {{ $demande->state_destination_after_ivoir }}
                        </td>
                        
                    </tr>
                   
                </tbody> 

            </table>
        </div>
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