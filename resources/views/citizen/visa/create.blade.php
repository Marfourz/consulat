@extends('layouts.layout')

@section('content')
<div class="w-full p-12">

   
   <div class="bg-white shadow-xl rounded p-8">
   <div class="text-2xl text-gray-700 mb-4">Demande de visa</div>
   <div class="flex w-full items-center my-4">
        <div class="w-1/4 h-1 bg-gray-200"></div>
        <div class="w-10 h-10 rounded-full border-2 flex items-center bg-green-700 text-white justify-center">1</div>
        <div class="w-1/4 h-1 bg-gray-200"></div>
        <div class="w-10 h-10 rounded-full border-2 flex items-center font-bold text-gray-500 justify-center">2</div>
        <div class="w-1/4 h-1 bg-gray-200"></div>
        <div class="w-10 h-10 rounded-full border-2 flex items-center font-bold text-gray-500 justify-center">3</div>
        <div class="w-1/4 h-1 bg-gray-200"></div>
   </div>
   <form action="" method="POST" class="grid md:grid-cols-3 grid-cols-1 gap-y-4 gap-x-6">
                    @csrf
                    <div>
                        <label for="" class="text-gray-600 mb-6">Situation familiale</label>
                        <div> 
                            <select name="family_status" id="" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline">
                                <option value="married">Marié</option>
                                <option value="divorced">Divorcé</option>
                                <option value="single">Célibataire</option>
                            </select>
                        </div>
                        @error('family_status')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>

                    <div>
                        <label for="" class="text-gray-600 mb-6">Nombre d'enfants</label>
                        <div><input name="number_of_children" type="number" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('number_of_children') }}"></div>
                        @error('number_of_children')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                    
                    <div>
                        <label for="" class="text-gray-600 mb-6">Age</label>
                        <div><input name="age" type="number" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('age') }}"></div>
                        @error('age')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-6">Domicile habituel</label>
                        <div><input name="usual_residence" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('usual_residence') }}"></div>
                        @error('usual_residence')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                   



                    <div>
                        <label for="" class="text-gray-600 mb-6">Profession</label>
                        <div><input name="profession" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('profession') }}"></div>
                        @error('profession')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-6">Situation militaire</label>
                        <div><input name="militaru_status" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('militaru_status') }}"></div>
                        @error('militaru_status')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>






                    <div>
                        <label for="" class="text-gray-600 mb-6">Voyage à destination</label>
                        <div><input name="profession" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('profession') }}"></div>
                        @error('profession')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-6">Durée des arrêts (jours)</label>
                        <div><input name="militaru_status" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('militaru_status') }}"></div>
                        @error('militaru_status')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-6">Durrée du séjour</label>
                        <div><input name="profession" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('profession') }}"></div>
                        @error('profession')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>







                    <div>
                        <label for="" class="text-gray-600 mb-6">Profession</label>
                        <div><input name="profession" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('profession') }}"></div>
                        @error('profession')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-6">Situation militaire</label>
                        <div><input name="militaru_status" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('militaru_status') }}"></div>
                        @error('militaru_status')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-6">Profession</label>
                        <div><input name="profession" type="text" class="border-2 w-full rounded-md p-2  text-gray-700 focus:outline-none focus:shadow-outline" value="{{ old('profession') }}"></div>
                        @error('profession')
                            <div class="text-red-700">{{$message}}</div>
                        @enderror
                        
                    </div>
                   



                  
                    
            </form>
            <div class="flex justify-end">
            <button class="bg-green-700 px-6 rounded text-white py-2 mt-4">Suivant</button>
            </div>
            
        </div>


       
           
  
</div>
@endsection