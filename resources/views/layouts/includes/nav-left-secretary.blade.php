<div style="width:320px" class="bg-gray-900">
    <div class="text-white font-bold text-2xl p-8">
        Consulat
    </div>
    <div class="flex flex-col space-y-4 ">
        <div class=" items-center flex w-full   space-x-4 {{ $menu == 'dashboard' ? 'text-white opacity-10 bg-opacity-10 bg-gray-800' : 'text-gray-700' }}">
            <div class="{{ $menu == 'dashboard' ? 'bg-white' : '' }} w-1 h-12"></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg></div>
            <a href="{{ route('secretary.dashboard') }}" class="">Accueil</a>
        </div>


        <div class="opacity-10 items-center flex w-full space-x-4 {{ $menu == 'carteConsulaire' ? 'text-white opacity-10 bg-opacity-10 bg-gray-800' : 'text-gray-700' }}">
            <div class="{{ $menu == 'carteConsulaire' ? 'bg-white' : '' }}  w-2 h-12"></div>
            <div><svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3C3.89543 3 3 3.89543 3 5V7C3 8.10457 3.89543 9 5 9H7C8.10457 9 9 8.10457 9 7V5C9 3.89543 8.10457 3 7 3H5Z"
                        fill="currentColor"></path>
                    <path
                        d="M5 11C3.89543 11 3 11.8954 3 13V15C3 16.1046 3.89543 17 5 17H7C8.10457 17 9 16.1046 9 15V13C9 11.8954 8.10457 11 7 11H5Z"
                        fill="currentColor"></path>
                    <path
                        d="M11 5C11 3.89543 11.8954 3 13 3H15C16.1046 3 17 3.89543 17 5V7C17 8.10457 16.1046 9 15 9H13C11.8954 9 11 8.10457 11 7V5Z"
                        fill="currentColor"></path>
                    <path
                        d="M11 13C11 11.8954 11.8954 11 13 11H15C16.1046 11 17 11.8954 17 13V15C17 16.1046 16.1046 17 15 17H13C11.8954 17 11 16.1046 11 15V13Z"
                        fill="currentColor"></path>
                </svg></div>
                <a href="{{ route('secretary.dashboard.carteConsulaire') }}" class="">Carte consulaire</a>
          
        </div>

        <div class="opacity-10 items-center flex w-full space-x-4 {{ $menu == 'laissezPasser' ? 'text-white opacity-10 bg-opacity-10 bg-gray-800' : 'text-gray-700' }}">
            <div class="{{ $menu == 'laissezPasser' ? 'bg-white' : '' }} w-2 h-12"></div>
            <div><svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3C3.89543 3 3 3.89543 3 5V7C3 8.10457 3.89543 9 5 9H7C8.10457 9 9 8.10457 9 7V5C9 3.89543 8.10457 3 7 3H5Z"
                        fill="currentColor"></path>
                    <path
                        d="M5 11C3.89543 11 3 11.8954 3 13V15C3 16.1046 3.89543 17 5 17H7C8.10457 17 9 16.1046 9 15V13C9 11.8954 8.10457 11 7 11H5Z"
                        fill="currentColor"></path>
                    <path
                        d="M11 5C11 3.89543 11.8954 3 13 3H15C16.1046 3 17 3.89543 17 5V7C17 8.10457 16.1046 9 15 9H13C11.8954 9 11 8.10457 11 7V5Z"
                        fill="currentColor"></path>
                    <path
                        d="M11 13C11 11.8954 11.8954 11 13 11H15C16.1046 11 17 11.8954 17 13V15C17 16.1046 16.1046 17 15 17H13C11.8954 17 11 16.1046 11 15V13Z"
                        fill="currentColor"></path>
                </svg></div>
                <a href="{{ route('secretary.dashboard.laissezPasser') }}" class="">Laissez passer</a>
        </div>

        <div class="opacity-10 items-center flex w-full space-x-4 {{ $menu == 'visa' ? 'text-white opacity-10 bg-opacity-10 bg-gray-800' : 'text-gray-700' }}">
            <div class="{{ $menu == 'visa' ? 'bg-white' : '' }} w-2 h-12"></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg></div>
                <a href="{{ route('secretary.dashboard.visa') }}" class="">Visa</a>

        </div>

        <div class="opacity-10 items-center flex w-full space-x-4 text-gray-700">
            <div class=" w-2 h-12"></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg></div>
            <div class="">Paramètres</div>
        </div>

    </div>


</div>
