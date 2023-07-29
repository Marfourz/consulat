@extends('layouts.layout-secretary')

@section('content')
    <div>
        <div class="w-full p-16">
            @if ($demande->status() != 'Accepté' || $demande->status() != 'Rejeté')
                <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
                    <div>Demande carte consulaire de {{ $demande->user->firstname }} {{ $demande->user->lastname }}</div>
                </div>
            @endif

            <form action="{{ route('carteConsulaire.generate') }}" method="POST">
                @csrf
                <input type="hidden" name="demandeId" value={{ $demande->id }}>
                <div class="text-gray-700 font-bold mb-4 xl">Vueillez entrer les informations suivantes</div>
                <div class="flex justify-between">
                    <div class="w-full">
                        <label for="start_at">Valable pour un an à partir de : </label>
                        <input required name="start_at" type="date" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline">
                    </div>
                    
                </div>

                <div class="flex justify-end mb-4 mt-4" class="">
                    <button type="submit" class="bg-green-700 px-4 py-3 text-sm rounded shadow  text-white">
                        Générer la carte consulaire
                    </button>
                </div>
            </form>
            @foreach ($demande->traitements as $traitement)
                @if ($traitement->status == 'accept')
                    <div class="flex mb-4 bg-green-700 text-white rounded-lg px-4 py-3 justify-between">
                        <div>
                            Demande accepté et document généré avec succès
                        </div>
                        <div>
                            <a href="{{ asset($traitement->document) }}"><button
                                    class="bg-white shadow-xl py-1 px-2 rounded text-gray-700 font-bold">Télécharger la
                                    carte consulaire</button></a>

                        </div>

                    </div>
                @elseif($traitement->status == 'reject')
                    <div class="mb-4 shadow">
                        <div class="flex bg-red-600 text-white rounded-top-lg px-4 py-3 justify-between">
                            Demande rejetée
                        </div>
                        <div class="border-2 bg-white p-4">
                            <div class="font-bold underline mb-2">Motif du rejet</div>
                            <div class="bg-gray-200 rounded-lg p-3">
                                {{ $traitement->comment }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="w-full bg-yellow-100 rounded-lg border-2 px-4 py-3  mb-4">
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
                                {{ $demande->mother_name }}
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
                                {{ $demande->piece_etablish_by }}
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
                                <a class="text-blue-700 underline"
                                    href="{{ asset('storage/' . $demande->path_picture) }}">Photo d'identité</a>
                            </td>

                        </tr>

                        <tr class="bg-gray-100">
                            <td>
                                Votre attestation de résidence
                            </td>
                            <td class="font-bold px-6">
                                <a href="{{ asset('storage/' . $demande->path_picture) }}"class="text-blue-700 underline">Cliquez
                                    pour voir l'attestation</a>
                            </td>

                        </tr>

                    </tbody>

                </table>

                <style>

                </style>
            </div>
        </div>


        <style>
            table {
                border-collapse: collapse;

            }

            td {
                color: rgba(0, 0, 0, 0.7);
                border: 1px solid rgba(0, 0, 0, 0.1);
                padding: 12px
            }
        </style>
    @endsection
