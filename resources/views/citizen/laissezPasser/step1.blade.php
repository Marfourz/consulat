@extends('layouts.layout')

@section('content')
<div class="w-full md:p-12 p-4">

    <div class="bg-white shadow-xl rounded p-8">
        <div class="text-2xl text-gray-700 mb-4">Demande de laissez passez</div>
        <div class="flex w-full items-center my-4">
            <div class="w-1/4 h-1 bg-gray-200"></div>
            <div class="w-10 h-10 rounded-full border-2 flex items-center bg-green-700 text-white justify-center">1
            </div>
            <div class="w-1/4 h-1 bg-gray-200"></div>
            <div class="w-10 h-10 rounded-full border-2 flex items-center font-bold text-gray-500 justify-center">2
            </div>
            <div class="w-1/4 h-1 bg-gray-200"></div>
            <div class="w-10 h-10 rounded-full border-2 flex items-center font-bold text-gray-500 justify-center">3
            </div>
            <div class="w-1/4 h-1 bg-gray-200"></div>
        </div>
        <form action="{{route('laissezPasser.storeStep1')}}" method="POST" >
            @csrf
            <div class="grid md:grid-cols-3 grid-cols-1 gap-y-4 gap-x-6">

                <div>
                    <label for="" class="text-gray-600 mb-6">Adrese en Cote d'ivoire <span class="text-red-700">*</span></label>
                    <div><input required name="ivoir_adress" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['ivoir_adress']) ? $data['ivoir_adress'] : old('ivoir_adress') }}"></div>
                    @error('ivoir_adress')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>


                <div>
                    <label for="" class="text-gray-600 mb-6">Date d'entrée au Bénin <span class="text-red-700">*</span></label>
                    <div><input required name="arrival_at" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['arrival_at']) ? $data['arrival_at'] : old('arrival_at') }}"></div>
                    @error('arrival_at')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Nom de la mère <span class="text-red-700">*</span></label>
                    <div><input required name="mother_name" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['mother_name']) ? $data['mother_name'] : old('mother_name') }}"></div>
                    @error('mother_name')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Nom du pére <span class="text-red-700">*</span></label>
                    <div><input required name="father_name" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['father_name']) ? $data['father_name'] : old('father_name') }}"></div>
                    @error('father_name')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Adresse des parents <span class="text-red-700">*</span></label>
                    <div><input required name="parent_adress" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['parent_adress']) ? $data['parent_adress'] : old('parent_adress') }}"></div>
                    @error('parent_adress')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Nom d'un contact au Bénin <span class="text-red-700">*</span></label>
                    <div><input required name="person_to_contact_benin_name" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['person_to_contact_benin_name']) ? $data['person_to_contact_benin_name'] : old('person_to_contact_benin_name') }}"></div>
                    @error('person_to_contact_benin_name')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Tel du contact au Bénin <span class="text-red-700">*</span></label>
                    <div><input required name="person_to_contact_benin_tel" type="phone"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['person_to_contact_benin_tel']) ? $data['person_to_contact_benin_tel'] : old('person_to_contact_benin_tel') }}"></div>
                    @error('person_to_contact_benin_tel')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Nom d'un contact en Cote d'ivoire <span class="text-red-700">*</span></label>
                    <div><input required name="person_to_contact_ivoir_name" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['ivoir_adress']) ? $data['person_to_contact_ivoir_name'] : old('person_to_contact_ivoir_name') }}"></div>
                    @error('person_to_contact_ivoir_name')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Numéro de téléphone du contact en Cote d'ivoire <span class="text-red-700">*</span></label>
                    <div><input required name="person_to_contact_ivoir_tel" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data['person_to_contact_ivoir_tel']) ? $data['person_to_contact_ivoir_tel'] : old('person_to_contact_ivoir_tel') }}"></div>
                    @error('person_to_contact_ivoir_tel')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

              
             
              
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-700 px-6 rounded text-white py-2 mt-4">Suivant</button>
            </div>
        </form>


    </div>

</div>
@endsection