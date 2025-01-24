@extends('layouts.layout')

@section('content')
<div class="w-full md:p-12 p-4">


    <div class="bg-white shadow-xl rounded p-8">
        <div class="text-2xl text-gray-700 mb-4">Demande de visa</div>
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
        <form action="{{route('visa.storeStep3')}}" method="POST" class="flex flex-col items-start space-y-4" enctype="multipart/form-data">
            @csrf
           
              

                {{-- <div>
                    <label for="" class="text-gray-600 mb-6">Indication précis du lieu d'entré en côte d'ivoire</label>
                    <div><input required name="ivoir_entry_point" type="text"
                            class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline"
                            value="{{ old('ivoir_entry_point') }}"></div>
                    @error('ivoir_entry_point')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror

                </div> --}}
                {{-- <div class="col-span-3">
                    <label for="" class="text-gray-600 mb-6">Promettez-vous de n'accepter aucun emploi rémunéré ou
                        salarié durant votre séjour en côte d'ivoir , de ne chercher à vous installer définitivement et
                        à quitter le territoire à l'expiration du visa qui vous sera éventuellement accordé ? </label>
                    <div class="flex space-x-2">
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name="not_work_install_and_quit_after_expiration" value="1"
                                id="not_work_install_and_quit_after_expiration_oui">
                            <label for="not_work_install_and_quit_after_expiration_oui"
                                class="text-gray-600 mb-6">Oui</label>
                        </div>
                        <div class="rounded border-2 py-2 px-4 w-1/2">
                            <input type="radio" name="not_work_install_and_quit_after_expiration" value="0"
                                id="not_work_install_and_quit_after_expiration_non">
                            <label for="not_work_install_and_quit_after_expiration_non"
                                class="text-gray-600 mb-6">Non</label>
                        </div>
                    </div>


                </div> --}}
                
                <div class="col-span-3 font-bold text-xl text-gray-600">
                    Veillez fournir les pièces suivantes
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4">
                    <div class="flex">
                        <div class="mb-3 w-96">
                          <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Une copie du billet d'avion</label>
                          <input required class="form-control
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" name="plane_ticket">
                        </div>
                      </div>
                      <div class="flex">
                        <div class="mb-3 w-96">
                          <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Une d'identité</label>
                          <input required class="form-control
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" name="picture">
                        </div>
                      </div>
                      <div class="flex">
                        <div class="mb-3 w-96">
                          <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Photocopie de la premère page de votre passport</label>
                          <input required class="form-control
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" name="passport">
                        </div>
                      </div>
                      <div class="flex">
                        <div class="mb-3 w-96">
                          <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Tout document justifiant le voyage ou le séjour en côte d'ivoire</label>
                          <input required class="form-control
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
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" name="letter_invatation_or_hotel_reservation">
                        </div>
                      </div>
    
                </div>
                




              



               

            <div class="flex justify-between w-full">
                <a href="{{route('visa.createStep2')}}">
                    <div class="bg-green-700 px-6 rounded text-white py-2 mt-4">Préccédent</div>
                </a>

                <button type="submit" class="bg-green-700 px-6 rounded text-white py-2 mt-4">Suivant</button>
            </div>
        </form>


    </div>





</div>
@endsection