

@extends('layouts.layout')

@section('content')
<div class="w-full p-12">


    <div class="bg-white shadow-xl rounded p-8">
        <div class="text-2xl text-gray-700 mb-4">Demande de laissez passer</div>
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


        <form action="{{route('laissezPasser.storeStep2')}}" method="POST">
            @csrf
            <div class="grid md:grid-cols-3 grid-cols-1 gap-y-4 gap-x-6">
               
                <div>
                    <label for="">Type de la piece</label>
                    <select required name="piece_type" id="piece_type"
                        class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline">
                        <option value="single">Carte d'identité</option>
                        <option value="married">Passport</option>
                        <option value="divorced">Carte biométrique</option>
                       
                    </select>
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Date d'obtention</label>
                    <div><input required name="piece_etablish_at" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['piece_etablish_at']  : old('piece_etablish_at') }}"></div>
                    @error('piece_etablish_at')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>



                <div>
                    <label for="" class="text-gray-600 mb-6">Numéro de la pièce</label>
                    <div><input required name="piece_number" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['piece_number']  : old('piece_number') }}"></div>
                    @error('piece_number')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Lieu d'obtention</label>
                    <div><input required name="piece_etablishment_place" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['piece_etablishment_place']  : old('piece_etablishment_place') }}"></div>
                    @error('piece_etablishment_place')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Établir par</label>
                    <div><input required name="piece_etablish_by" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['piece_etablish_by']  : old('piece_etablish_by') }}"></div>
                    @error('piece_etablish_by')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Expire le</label>
                    <div><input required name="piece_expiry_at" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data) ? $data['piece_expiry_at']  : old('piece_expiry_at') }}"></div>
                    @error('piece_expiry_at')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div class="col-span-3">Information sur le passport</div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Obtenu le : </label>
                    <div><input required name="passport_extend_from" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data['passport_extend_from']) ? $data['passport_extend_from']  : old('passport_extend_from') }}"></div>
                    @error('passport_extend_from')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Expire le: </label>
                    <div><input required name="passport_extend_to" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data['passport_extend_to']) ? $data['passport_extend_to']  : old('passport_extend_to') }}"></div>
                    @error('passport_extend_to')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Lieu d'obtention: </label>
                    <div><input required name="passport_extend_by" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{isset($data['passport_extend_by']) ? $data['passport_extend_by']  : old('passport_extend_by') }}"></div>
                    @error('passport_extend_by')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

            </div>

            <div class="flex justify-between w-full">
            <a href="{{route('laissezPasser.createStep1')}}"><div
                    class="bg-green-700 px-6 rounded text-white py-2 mt-4">Préccédent</div></a>

            <button type="submit" class="bg-green-700 px-6 rounded text-white py-2 mt-4">Suivant</button>
        </div>



        </form>
        
    </div>










</div>
@endsection