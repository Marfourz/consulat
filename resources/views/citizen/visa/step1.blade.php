@extends('layouts.layout')

@section('content')
<div class="w-full p-12">

    <div class="bg-white shadow-xl rounded p-8">
        <div class="text-2xl text-gray-700 mb-4">Demande de visa</div>
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
        <form action="{{route('visa.storeStep1')}}" method="POST" >
            @csrf
            <div class="grid md:grid-cols-3 grid-cols-1 gap-y-4 gap-x-6">
                <div>
                    <label for="" class="text-gray-600 mb-6">Situation familiale</label>
                    <div>
                        <select required name="family_status" id=""
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline">
                            <option value="single">Célibataire</option>
                            <option value="married">Marié</option>
                            <option value="divorced">Divorcé</option>
                           
                        </select>
                    </div>
                    @error('family_status')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Nombre d'enfants</label>
                    <div><input required name="number_of_children" type="number"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['number_of_children'] : old('number_of_children') }}"></div>
                    @error('number_of_children')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Age</label>
                    <div><input required name="age" type="number"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['age']  : old('age') }}"></div>
                    @error('age')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Domicile habituel</label>
                    <div><input required name="usual_residence" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['usual_residence']  : old('usual_residence') }}"></div>
                    @error('usual_residence')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Profession</label>
                    <div><input required name="profession" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['profession']  : old('profession') }}"></div>
                    @error('profession')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                {{-- <div>
                    <label for="" class="text-gray-600 mb-6">Situation militaire</label>
                    <div><input name="militaru_status" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ old('militaru_status') }}"></div>
                    @error('militaru_status')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror
                </div> --}}

                <div>
                    <label for="" class="text-gray-600 mb-6">Numéro du passport</label>
                    <div><input name="passport_number" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['passport_number']  : old('passport_number') }}"></div>
                    @error('passport_number')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Date d'obtention</label>
                    <div><input name="passport_created_at" type="date"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['passport_created_at']  : old('passport_created_at') }}"></div>
                    @error('passport_created_at')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Lieu d'obtention</label>
                    <div><input name="passport_created_by" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['passport_created_by']  : old('passport_created_by') }}"></div>
                    @error('passport_created_by')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Valide jusqu'au</label>
                    <div><input type="date" name="passport_expiry" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['passport_expiry']  : old('passport_expiry') }}"></div>
                    @error('passport_expiry')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div>
            
                <div>
                    <label for="" class="text-gray-600 mb-6">Durée des arrêts (jours)</label>
                    <div><input name="stop_duration" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['stop_duration']  : old('stop_duration') }}"></div>
                    @error('stop_duration')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-6">Durrée du séjour (jours)</label>
                    <div><input name="stay_duration" type="number"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ isset($data) ? $data['stay_duration']  : old('stay_duration') }}"></div>
                    @error('stay_duration')
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