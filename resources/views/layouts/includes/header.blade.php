<div class="flex h-16 bg-green-700 items-center justify-between text-white p-8">
    <div><img src="{{ asset('images/logo.png') }}" alt="" class="w-16 h-16"></div>
    <div class=" flex space-x-8">
        <div> Accueil </div>
        <div> Services </div>
        <div>A propos</div>
    </div>

    @if(!Auth::check())
    <div class="flex space-x-2 items-center">
        
        <a href="{{route('login')}}"><button class="bg-white rounded px-4 py-2 text-green-700">Se connecter</button></a>
        <a href="{{route('register')}}"><button>S'inscrire</button></a>
        
    </div>

    @else

        <div class="flex space-x-4">
            <div>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</div>
            <a href="{{route('register')}}"><button>Se deconnecter</button></a>
        </div>

        

    @endif
</div>