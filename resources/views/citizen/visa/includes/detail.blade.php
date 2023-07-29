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
            <tr class="bg-gray-100">
                <td>
                    Billet d'avion
                </td>
                <td class="font-bold px-6">
                    <a  href="{{ asset('storage/'.$demande->path_plane_ticket)}}"class="text-blue-700 underline">Cliquez pour voir l'attestation</a>
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                   Pièce d'identité
                </td>
                <td class="font-bold px-6">
                    <a  href="{{ asset('storage/'.$demande->path_passport)}}"class="text-blue-700 underline">Cliquez pour voir l'attestation</a>
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Premère page de votre passport
                </td>
                <td class="font-bold px-6">
                    <a  href="{{ asset('storage/'.$demande->path_letter_invatation_or_hotel_reservation)}}"class="text-blue-700 underline">Cliquez pour voir l'attestation</a>
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Tout document justifiant le voyage ou le séjour en côte d'ivoire
                </td>
                <td class="font-bold px-6">
                    <a  href="{{ asset('storage/'.$demande->path_picture)}}"class="text-blue-700 underline">Cliquez pour voir l'attestation</a>
                </td>
                
            </tr>
           
        </tbody> 

    </table>
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