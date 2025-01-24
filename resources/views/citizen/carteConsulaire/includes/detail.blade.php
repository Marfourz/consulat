<div class="p-4">
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
                    Adresse en Cote d'ivoire
                </td>
                <td class="font-bold px-6">
                    {{ $demande->ivoir_adress }}
                </td>
                
            </tr>

            

            <tr class="">
                <td>
                    Date d'entrée au Bénin
                </td>
                <td class="font-bold px-6">
                    {{ $demande->arrival_at }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Nom de la mère
                </td>
                <td class="font-bold px-6">
                    {{ $demande->mother_name}}
                </td>
                
            </tr>

            <tr class="">
                <td>
                    Nom du pére
                </td>
                <td class="font-bold px-6">
                    {{ $demande->father_name }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Adresse des parents
                </td>
                <td class="font-bold px-6">
                    {{ $demande->parent_adress }}
                </td>
                
            </tr>


            <tr class="bg-gray-100">
                <td>
                    Nom d'un contact au Bénin
                </td>
                <td class="font-bold px-6">
                    {{ $demande->person_to_contact_benin_name }}
                </td>
                
            </tr>


            <tr class="">
                <td>
                    Tel du contact au Bénin
                </td>
                <td class="font-bold px-6">
                    {{ $demande->person_to_contact_benin_tel }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Nom d'un contact en Cote d'ivoire
                </td>
                <td class="font-bold px-6">
                    {{ $demande->person_to_contact_ivoir_name }}
                </td>
                
            </tr>

            <tr class="">
                <td>
                    Numéro de téléphone du contact en Cote d'ivoire
                </td>
                <td class="font-bold px-6">
                    {{ $demande->person_to_contact_ivoir_tel }}
                </td>
                
            </tr>



            <tr class="bg-gray-100">
                <td>
                    Type de la piece
                </td>
                <td class="font-bold px-6">
                    {{ $demande->piece_type }}
                </td>
                
            </tr>

            <tr class="">
                <td>
                    Date d'obtention
                </td>
                <td class="font-bold px-6">
                    {{ $demande->piece_etablish_at }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Numéro de la pièce
                </td>
                <td class="font-bold px-6">
                    {{ $demande->piece_number }}
                </td>
                
            </tr>

            <tr class="">
                <td>
                    Lieu d'obtention
                </td>
                <td class="font-bold px-6">
                    {{ $demande->piece_etablishment_place }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Établir par
                </td>
                <td class="font-bold px-6">
                    {{ $demande->piece_etablishment_place }}
                </td>
                
            </tr>

            <tr class="">
                <td>
                    Expire le
                </td>
                <td class="font-bold px-6">
                    {{ $demande->piece_etablish_by}}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Passport obtenu le :
                </td>
                <td class="font-bold px-6">
                    {{ $demande->passport_extend_from }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Passport expire le:
                </td>
                <td class="font-bold px-6">
                    {{ $demande->passport_extend_by }}
                </td>
                
            </tr>
            
            <tr class="bg-gray-100">
                <td>
                    Passport lieu d'obtention:
                </td>
                <td class="font-bold px-6">
                    {{ $demande->passport_extend_to }}
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Une photo d'identité
                </td>
                <td class="font-bold px-6">
                    <a class="text-blue-700 underline" href="{{ url('file/'.$demande->path_picture)}}">Photo d'identité</a>
                </td>
                
            </tr>

            <tr class="bg-gray-100">
                <td>
                    Votre attestation de résidence
                </td>
                <td class="font-bold px-6">
                    <a  href="{{ url('file/'.$demande->path_picture)}}"class="text-blue-700 underline">Cliquez pour voir l'attestation</a>
                </td>
                
            </tr>
           
        </tbody> 

    </table>

    <style>
      
    </style>
</div> 