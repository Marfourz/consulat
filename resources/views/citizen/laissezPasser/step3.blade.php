@extends('layouts.layout')

@section('content')
    <div class="w-full p-12 md:p-4">


        <div class="bg-white shadow-xl rounded p-8">
            <div class="text-2xl text-gray-700 mb-4">Demande de laissez passer</div>
            <div class="flex w-full items-center my-4">
                <div class="w-1/4 h-1 bg-gray-200"></div>
                <div class="w-10 h-10 rounded-full border-2 flex items-center text-gray-500 justify-center">1</div>
                <div class="w-1/4 h-1 bg-gray-200"></div>
                <div class="w-10 h-10 rounded-full border-2 flex items-center font-bold text-gray-500 justify-center">2
                </div>
                <div class="w-1/4 h-1 bg-gray-200"></div>
                <div
                    class="w-10 h-10 rounded-full border-2 flex items-center font-bold  justify-center bg-green-700 text-white">
                    3</div>
                <div class="w-1/4 h-1 bg-gray-200"></div>
            </div>
            <form action="{{ route('laissezPasser.storeStep3') }}" method="POST" class="flex flex-col items-start space-y-4"
                enctype="multipart/form-data">
                @csrf

                <div class="col-span-3 font-bold text-xl text-gray-600">
                    Veillez fournir les pièces suivantes
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4">
                  
                    <div class="flex">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> Une photo d'identité <span class="text-red-700">*</span></label>
                            <input required
                                class="form-control
                          block
                          w-full
                          px-3
                          py-1.5
                          text-base
                          font-normal
                          text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="picture">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Votre attestation de résidence <span class="text-red-700">*</span></label>
                            <input required
                                class="form-control
                          block
                          w-full
                          px-3
                          py-1.5
                          text-base
                          font-normal
                          text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="attestation_residence">
                        </div>
                    </div>

                    <div class="flex">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Passport expiré <span class="text-red-700">*</span></label>
                            <input required
                                class="form-control
                          block
                          w-full
                          px-3
                          py-1.5
                          text-base
                          font-normal
                          text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="passport_expiry">
                        </div>
                    </div>

                    <div class="flex">
                        <div class="mb-3 w-96">
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Billet d'avion <span class="text-red-700">*</span></label>
                            <input required
                                class="form-control
                          block
                          w-full
                          px-3
                          py-1.5
                          text-base
                          font-normal
                          text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="plane_ticket">
                        </div>
                    </div>

                    

                </div>











                <div class="flex justify-between w-full">
                    <a href="{{ route('laissezPasser.createStep2') }}">
                        <div class="bg-green-700 px-6 rounded text-white py-2 mt-4">Préccédent</div>
                    </a>

                    <button type="submit" class="bg-green-700 px-6 rounded text-white py-2 mt-4">Suivant</button>
                </div>
            </form>


        </div>





    </div>
@endsection
