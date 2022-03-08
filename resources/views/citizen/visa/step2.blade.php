@extends('layouts.layout')

@section('content')
<div class="w-full p-12">


    <div class="bg-white shadow-xl rounded p-8">
        <div class="text-2xl text-gray-700 mb-4">Demande de visa</div>
        <div class="flex w-full items-center my-4">
            <div class="w-1/4 h-1 bg-gray-200"></div>
            <div class="w-10 h-10 rounded-full border-2 flex items-center justify-center font-bold text-gray-500">1
            </div>
            <div class="w-1/4 h-1 bg-gray-200"></div>
            <div class="w-10 h-10 rounded-full border-2 flex items-center bg-green-700 text-white   justify-center">2
            </div>
            <div class="w-1/4 h-1 bg-gray-200"></div>
            <div class="w-10 h-10 rounded-full border-2 flex items-center font-bold text-gray-500 justify-center">3
            </div>
            <div class="w-1/4 h-1 bg-gray-200"></div>
        </div>


        <form action="{{route('visa.storeStep2')}}" method="POST">
            @csrf
            <div class="grid md:grid-cols-3 grid-cols-1 gap-y-4 gap-x-6">
               
                <div class="col-span-2">
                    <label for="" class="text-gray-600 mb-6">Motif détallé du voyage</label>
                    <div><input required name="travel_reason" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['travel_reason']  : old('travel_reason') }}"></div>
                    @error('travel_reason ')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Date d'entrée</label>
                    <div><input required name="entry_at" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['entry_at']  : old('entry_at') }}"></div>
                    @error('entry_at')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Attaché familiale en cote d'ivoire</label>
                    <div class="flex space-x-2">
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name="has_relatives_in_ivoir" value="1" id="has_relatives_in_ivoir_oui">
                            <label for="has_relatives_in_ivoir_oui" class="text-gray-600 mb-6">Oui</label>
                        </div>
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name="has_relatives_in_ivoir" value="0" id="has_relatives_in_ivoir_non">
                            <label for="has_relatives_in_ivoir_non" class="text-gray-600 mb-6">Non</label>
                        </div>
                    </div>


                </div>
                <div class="col-span-2">
                    <label for="" class="text-gray-600 mb-6">Indication de vos adresses exactes en (rue et N°) en Côte
                        d'Ivoire pendant votre séjour</label>
                    <div><input required name="ivoir_adress_during_staying" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['ivoir_adress_during_staying']  : old('ivoir_adress_during_staying') }}"></div>
                    @error('ivoir_adress_during_staying')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div class="col-span-2">
                    <label for="" class="text-gray-600 mb-6">Comptez-vous établir un commerce en cote d'ivoire ?</label>
                    <div class="flex space-x-2">
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name=" etablish_commerce_in_ivoir" value="1"
                                {{isset($data) && $data['etablish_commerce_in_ivoir'] == '1' ? 'checked' : ''}}
                                id=" etablish_commerce_in_ivoir_oui">
                            <label for=" etablish_commerce_in_ivoir_oui" class="text-gray-600 mb-6">Oui</label>
                        </div>
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name=" etablish_commerce_in_ivoir" value="0"
                            {{isset($data) && $data['etablish_commerce_in_ivoir'] == '0' ? 'checked' : ''}}
                                id=" etablish_commerce_in_ivoir_non">
                            <label for=" etablish_commerce_in_ivoir_non" class="text-gray-600 mb-6">Non</label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Destination après la cote d'ivoire</label>
                    <div><input required name="state_destination_after_ivoir" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['state_destination_after_ivoir']  : old('state_destination_after_ivoir') }}"></div>
                    @error('state_destination_after_ivoir')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

            

                {{-- <div class="col-span-2">
                    <label for="" class="text-gray-600 mb-6"> Avez vous déja habité en cote d'ivoire pendant plus de
                        trois mois sans interruption ?</label>
                    <div class="flex space-x-2">
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input required type="radio" name="habit_ivoir_exceeding_three_months" value="1"
                                id="habit_ivoir_exceeding_three_months_oui">
                            <label for="habit_ivoir_exceeding_three_months_oui" class="text-gray-600 mb-6">Oui</label>
                        </div>
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name="habit_ivoir_exceeding_three_months" value="0"
                                id="habit_ivoir_exceeding_three_months_non">
                            <label for="habit_ivoir_exceeding_three_months_non" class="text-gray-600 mb-6">Non</label>
                        </div>
                    </div>


                </div> --}}

                {{-- <div>
                    <label for="" class="text-gray-600 mb-6">Si oui ? A quelle date </label>
                    <div><input  name="habit_ivoir_at" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ old('habit_ivoir_at') }}"></div>
                    @error('habit_ivoir_at')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div class="col-span-3">
                    <label for="" class="text-gray-600 mb-6">Indiquez avec précision les noms et les adresses (rue et
                        N°) des commercants ou des industries que vous désirez rencontrer s'il s'agit d'un voyage
                        d'affaire </label>
                    <div><textarea name="information_about_traders_industralists" id="" cols="30" rows="2"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    @error('information_about_traders_industralists')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div> --}}

            </div>

            <div class="flex justify-between w-full">
            <a href="{{route('visa.createStep1')}}"><div
                    class="bg-green-700 px-6 rounded text-white py-2 mt-4">Préccédent</div></a>

            <button type="submit" class="bg-green-700 px-6 rounded text-white py-2 mt-4">Suivant</button>
        </div>



        </form>
        
    </div>










</div>
@endsection