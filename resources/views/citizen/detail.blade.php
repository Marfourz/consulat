@extends('layouts.layout')

@section('content')
    <div class=" bg-white">
        <div class="w-full h-42 bg-black relative">
            <img src="{{ asset('images/elephant2.jpg') }}" alt="" class="w-full h-full">
            <div class="flex items-center justify-center absolute top-0 bottom-0 left-0 right-0 bg-black opacity-50">
                <div class="text-white text-3xl">Nos services</div>
            </div>
        </div>

        <div class="md:px-32 p-8 md:py-16 flex md:flex-row flex-col md:space-x-8 space-y-4 md:space-y-0 text-lg">

            <div class="space-y-6 md:w-2/3">
                <div class="text-4xl ">Carte consulaire</div>
               
                <div>
                    Ce service permet d'obtenir un extrait du registre de commerce et de crédit mobilier (RCCM) d'une
                    entreprise non radiée.
                </div>
                <div class="space-y-6">
                    <div>
                        <div class="text-blue-900 font-bold">Durée de traitement</div>
                        <div class="ml-4">3 jours</div>
                    </div>
                    <div>
                        <div class="text-blue-900 font-bold">Montant à payer</div>
                        <div class="ml-4">5000 FCFA</div>
                    </div>
                    <div>
                        <div class="text-blue-900 font-bold">Processus de demande</div>
                        <ul class="list-decimal pl-8">
                            <li>Cliquez sur faire une demande</li>
                            <li>Remplissez le formulaire avec les informations demandées</li>
                            <li>Fournissez les fichiers demandés</li>
                        </ul>
                    </div>
                    <div class="">
                        <a href="{{ route('carteConsulaire.createStep1') }}">
                            <div
                                class="mt-4 text-bold text-white rounded border-2 border-green-700 bg-green-700 text-center px-4 py-2 w-64">
                                Faire une demande</div>
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="border rounded md:w-1/3 h-64">
                <div class="bg-gray-200 p-2 text-xl border rounde-t font-bold">Pièces à fournir</div>
                <div class="py-8 px-2">
                    <ul class="list-disc pl-8">
                        <li>Une photo d'identité</li>
                        <li>Une copie de votre passport</li>
                    </ul>
                </div>
            </div>


        </div>


    </div>
@endsection
