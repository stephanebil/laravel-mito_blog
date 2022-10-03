@php
    $styleLink = "uppercase font-bold hover:text-blue-500 hover:border-b-2 hover:border-blue-500 p-2"
@endphp

<x-layouts.main-layout title="Dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="text-center font-bold text-4xl">Bienvenue <span class="text-blue-500">{{ Auth::user()->name }}</span> sur ton Dashboard</h1>
        <div class="py-12 grid max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div> --}}
                <a href="{{ route('posts.create') }}" class="{{ $styleLink }}">new post</a>
                <a href="{{ route('posts.all') }}" class="{{ $styleLink }}">La liste des Posts</a>
                <a href="{{ route('users.all') }}" class="{{ $styleLink }}">La liste les utilisateurs</a>
            </div>
        </div>
    </div>
</x-layouts.main-layout>
