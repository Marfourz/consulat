@extends('layouts.layout-secretary')

@section('content')
    <div>
        <div class="w-full p-16">
            @if ($demande->status() != 'Accepté' && $demande->status() != 'Rejeté')
                <div class="text-2xl text-gray-700 mb-8 flex space-x-4 justify-between">
                    <div>Demande laissez passer de {{ $demande->user->firstname }} {{ $demande->user->lastname }}</div>
                </div>
            @endif

            <form action="{{ route('laissezPasser.generate') }}" method="POST">
                @csrf
                <input type="hidden" name="demandeId" value={{ $demande->id }}>
                <div class="text-gray-700 font-bold mb-4 xl">Vueillez entrer les informations suivantes</div>

                <div class="grid  grid-cols-2 gap-x-4 gap-y-2">
                    <div class="col-span-2">
                        <label for="" class="text-gray-600">Référence </label>
                        <div><input required name="reference" type="text"
                                class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                                value="{{ isset($data['reference']) ? $data['reference'] : old('reference') }}"></div>
                        @error('size')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
    
                    </div>
                    <div>
                        <label for="" class="text-gray-600">Taille </label>
                        <div><input required name="size" type="text"
                                class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                                value="{{ isset($data['size']) ? $data['size'] : old('size') }}"></div>
                        @error('size')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
    
                    </div>

                    <div>
                        <label for="" class="text-gray-600">Couleur des cheveux </label>
                        <div><input required name="hair_color" type="text"
                                class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                                value="{{ isset($data['hair_color']) ? $data['hair_color'] : old('hair_color') }}"></div>
                        @error('size')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
    
                    </div>


                    <div>
                        <label for="" class="text-gray-600">Couleur des yeux </label>
                        <div><input required name="eye_color" type="text"
                                class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                                value="{{ isset($data['eye_color']) ? $data['eye_color'] : old('eye_color') }}"></div>
                        @error('size')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
    
                    </div>


                    <div>
                        <label for="" class="text-gray-600">Signes particulières </label>
                        <div><input required name="particular_sign" type="text"
                                class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                                value="{{ isset($data['particular_sign']) ? $data['particular_sign'] : old('particular_sign') }}"></div>
                        @error('size')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
    
                    </div>
                   
                
                </div>

                <div class="flex justify-end mb-4 mt-4" class="">
                    <button type="submit" class="bg-green-700 px-4 py-3 text-sm rounded shadow  text-white">
                        Générer le laissez passer
                    </button>
                </div>
            </form>
        
            @include('citizen.laissezPasser.includes.decision',['demande'=>$demande])
            @include('citizen.laissezPasser.includes.detail',['demande'=>$demande])
    

       
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
