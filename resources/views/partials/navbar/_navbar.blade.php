@php
    $styleLink = "hover:text-blue-500 hover:border-b-2 p-2"
@endphp

<nav>
    <div class="flex justify-between p-6 px-10 bg-black text-white">
        <div class="" id="logo">
            <p class="text-xl font-bold text-blue-500"> <a href="/" class="">Mit<span class="text-white uppercase">o</span> Blog</a></p>
        </div>
        <div class="space-x-5 uppercase flex justify-between items-center" id="navitem">
            <div class="flex space-x-4">
                @guest
                    {{-- <li class=""><a href="/" class="p-2  hover:text-blue-500 hover:border-b-2 <?php echo (basename($_SERVER['PHP_SELF'])=='/')?"active font-bold border-b-2 border-blue-500 pb-4":"" ?>">Accueil</a></li> --}}
                    {{-- <li class=""><a href="{{ route('posts.create') }}" class=" p-2  hover:text-blue-500 hover:border-b-2">New post</a></li> --}}
                   
                    <a href="{{ route('login') }}" class=" {{ $styleLink }}">Connexion</a>
                    <a href="{{ route('register') }}" class=" {{ $styleLink }}">Inscription</a>
                    
                @endguest
                    {{-- < li class=""><a href="{{ route('logout') }}" class=" {{ $styleLink }}">Déconnexion</a></li> --}}
                @auth
                    <a href="{{ route('dashboard') }}" class=" {{ $styleLink }}">Dashboard</a>
                    <x-btn-logout />
                    <span>Hello, {{ Auth::user()->name }}</span>
                @endauth    
            </div>
        </div>
    </div>
</nav>

