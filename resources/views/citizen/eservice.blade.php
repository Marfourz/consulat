@extends('layouts.layout')

@section('content')
    <div class=" bg-white">
        <div class="w-full h-42 bg-black relative">
            <img src="{{ asset('images/elephant2.jpg') }}" alt="" class="w-full h-full">
            <div class="flex items-center justify-center absolute top-0 bottom-0 left-0 right-0 bg-black opacity-50">
                <div class="text-white text-3xl">Nos services</div>
            </div>
        </div>

        <div class="md:px-32 p-8 md:py-16 space-y-8">
            <div class="text-4xl ">Nos services</div>

            <div class="grid md:grid-cols-3 gap-12 bg-white">
                <div class="border-2 rounded px-4 py-6 flex-col space-y-6">
                    <div class="flex items-center space-x-4">
                        <div
                            class="rounded-full w-16 h-16  bg-gray-500 text-bold text-white flex items-center justify-center text-4xl">
                            C
                        </div>
                        <div class="font-bold text-2xl">Carte consulaire</div>
                    </div>
                    <div>Ce service permet de consulter les appels d'offre et de soumissionner aux marchés publics à travers
                        la plate-forme</div>
                    <div class="text-blue-700 font-bold uderline cursor-pointer"><a
                            href="{{ route('eservice.detail', 'carteConsulaire') }}">Afficher les détails</a></div>
                    <a href="{{ route('carteConsulaire.createStep1') }}">
                        <div
                            class="mt-4 text-bold text-white rounded border-2 border-green-700 bg-green-700 text-center px-4 py-2">
                            Faire une demande</div>
                    </a>
                </div>

                <div class="border-2 rounded px-4 py-6 flex-col space-y-6">
                    <div class="flex items-center space-x-4">
                        <div
                            class="rounded-full w-16 h-16  bg-gray-500 text-bold text-white flex items-center justify-center text-4xl">
                            L
                        </div>
                        <div class="font-bold text-2xl">Laissez passer</div>
                    </div>
                    <div>Ce service permet de consulter les appels d'offre et de soumissionner aux marchés publics à travers
                        la plate-forme</div>
                    <div class="text-blue-700 font-bold uderline cursor-pointer">Afficher les détails</div>
                    <a href="{{ route('laissezPasser.createStep1') }}">
                        <div
                            class="mt-4 text-bold text-white rounded border-2 border-green-700 bg-green-700 text-center px-4 py-2">
                            Faire une demande</div>
                    </a>
                </div>

                <div class="border-2 rounded px-4 py-6 flex-col space-y-6">
                    <div class="flex items-center space-x-4">
                        <div
                            class="rounded-full w-16 h-16  bg-gray-500 text-bold text-white flex items-center justify-center text-4xl">
                            V
                        </div>
                        <div class="font-bold text-2xl">Visa</div>
                    </div>
                    <div>Ce service permet de consulter les appels d'offre et de soumissionner aux marchés publics à travers
                        la plate-forme</div>
                    <div class="text-blue-700 font-bold uderline cursor-pointer">Afficher les détails</div>
                    <a href="{{ route('visa.createStep1') }}">
                        <div
                            class="mt-4 text-bold text-white rounded border-2 border-green-700 bg-green-700 text-center px-4 py-2">
                            Faire une demande</div>
                    </a>

                </div>
            </div>
        </div>


    </div>
@endsection
