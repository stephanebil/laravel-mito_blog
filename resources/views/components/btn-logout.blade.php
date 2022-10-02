 <!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf

    {{-- <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link> --}}
    <button href="{{ route('logout') }}" type="submit" class="btn btn-primary">Déconnexion</button>

</form>