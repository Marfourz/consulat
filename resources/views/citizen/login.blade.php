@extends('layouts.app')

@section('content')
<div class="w-full h-screen md:flex bg-green-700">
    <div class="hidden md:flex  md:w-1/2 items-center">
        <img class="w-full h-full " src="{{asset('images/smile2.png')}}" alt="">
    </div>
    <div class="md:w-2/3 md:flex flex-col items-center justify-center pt-8 h-full" style="background-color:
">
        <div class="p-8 shadow flex flex-col w-3/5 justify-center items-center bg-white">
            <div class="text-2xl font-bold text-gray-700 mb-6 text-center"> Connexion</div>
            <form action="{{route('verifyLogin')}}" class="w-full space-y-4 flex justify-center flex-col" method="POST">
                @csrf
                <input type="hidden" required name="redirectionUrl" value="{{$uri}}">

                
                @if(session()->has('danger'))
                    <div class="bg-red-400 text-white rounded p-2">
                        {{ session()->get('danger') }}
                    </div>
                @endif
                <div>
                    <label for="" class="text-gray-600 mb-6">Nom</label>
                    <div class="w-full"><input required type="email" name="email"
                            class=" w-full border-2 rounded p-2 text-gray-700 focus:outline-none focus:shadow-outline"></div>

                </div>

                <div>
                    <label for="" class="text-gray-600 mb-6">Prénom</label>
                    <div>
                        <input  name="password" type="password"
                                class="w-full border-2 rounded p-2 text-gray-700 focus:outline-none focus:shadow-outline">
                    </div>

                </div>
                
                <button class="bg-green-700 px-4 py-2  rounded shadow  text-white mt-6 col-span-2">
                    Se connecter
                </button>
            </form>

            <a href="{{ route('register') }}" class="mt-4 text-blue-700">J'ai pas de compte</a>


        </div>



    </div>


</div>
@endsection