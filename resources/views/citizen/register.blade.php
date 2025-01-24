@extends('layouts.app')

@section('content')
    <div class="w-full h-screen md:flex ">
        <div class="hidden md:flex md:w-1/2 items-center h-screen bg-green-700">
            <img class="w-full h-screen " src="{{ asset('images/smile2.png') }}" alt="">
        </div>
        <div class="md:w-2/3 md:flex flex-col items-center pt-6 bg-blue-50 overflow-auto">
            <div class="p-8 shadow flex flex-col bg-white">
                @if ($uri)
                    <div class="p-4 bg-green-400 rounded-lg text-white">Inscrivez vous ou connectez vous pour continuer.Ces
                        informations seront utilisé pour la génération de vos documents</div>
                @endif

                <div class="text-2xl font-bold text-gray-700 mb-6 text-center"> Inscription</div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="redirectionUrl" value="{{ $uri }}">
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-x-6 gap-y-4">
                        <div>
                            <label for="" class="text-gray-600 mb-6">Nom <span class="text-red-700">*</span></label>
                            <div><input name="lastname" type="text"
                                    class="border-2 rounded py-1 px-2  text-gray-700 focus:outline-none focus:shadow-outline w-full"
                                    value="{{ old('lastname') }}"></div>
                            @error('lastname')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>

                        <div>
                            <label for="" class="text-gray-600 mb-6">Prénom <span class="text-red-700">*</span></label>
                            <div>
                                <input name="firstname" type="text"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    value="{{ old('firstname') }}">
                            </div>
                            @error('firstname')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                        <div>
                            <label for="" class="text-gray-600 mb-6">Date de naissance <span class="text-red-700">*</span></label>
                            <div><input name="birthday" type="date"
                                    class=" border-2 rounded py-1 px-2 text-gray-700 focus:outline-none w-full focus:shadow-outline"
                                    value="{{ old('birthday') }}"></div>
                            @error('birthday')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="" class="text-gray-600 mb-6">Lieu de naissance <span class="text-red-700">*</span></label>
                            <div>
                                <input name="birthplace" type="text"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    value="{{ old('birthplace') }}">
                            </div>
                            @error('birthplace')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                        <div>
                            <label for="" class="text-gray-600 mb-6">Nationalité <span class="text-red-700">*</span></label>
                            <div>
                                <select name="nationality_id" id="nationality_id" 
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    required
                                    value="{{ old('nationality_id') }}">
                                        @foreach($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            @error('nationality_id')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                            </div> 
                         
                            <!-- <div><input name="nationality" type="text"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    value="{{ old('nationality') }}"></div>
                         
                        </div> -->

                        <div>
                            <label for="" class="text-gray-600 mb-6">Adresse <span class="text-red-700">*</span></label>
                            <div>
                                <input name="adress" type="text"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    value="{{ old('adress') }}">
                            </div>
                            @error('adress')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror


                        </div>

                        <div>
                            <label for="" class="text-gray-600 mb-6">Profession <span class="text-red-700">*</span></label>
                            <div><input name="profession" type="text"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    value="{{ old('profession') }}"></div>
                            @error('profession')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="" class="text-gray-600 mb-6">Email <span class="text-red-700">*</span></label>
                            <div>
                                <input name="email" type="email"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline"
                                    value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                        <div>
                            <label for="" class="text-gray-600 mb-6">Mot de passe <span class="text-red-700">*</span></label>
                            <div>
                                <input name="password" type="password"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline">
                            </div>
                            @error('password')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror

                        </div>
                        <div>
                            <label for="" class="text-gray-600 mb-6">Confirmer le mot de passe <span class="text-red-700">*</span></label>
                            <div>
                                <input name="confirmPassword" type="password"
                                    class="w-full border-2 rounded py-1 px-2 text-gray-700 focus:outline-none focus:shadow-outline">
                            </div>

                        </div>
                    </div>

                    <div class="mt-4 flex flex-col space-y-4 justify-start">
                        <div class="">
                            <button type="submit" class="bg-green-700 px-4 py-2 rounded shadow  text-white mt-6 w-40">
                                Soumettre
                            </button>
                        </div>
                      
                        <a href="{{ route('login') }}" class="text-center col-span-2 text-blue-400">J'ai déja un compte</a>
                    </div>



                </form>


            </div>



        </div>


    </div>
@endsection
