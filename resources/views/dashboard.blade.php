<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                <br>
                 <a href="{{route('admin.home')}}">Vehicules </a>
                <br>
                <a href="{{route('Allreservations')}}">Reservations </a>
                <br>
                <a href="{{route('clients.index')}}">Utilisateurs </a>
                <br>
                <a href="{{route('Allvehicules1')}}">Vehicules </a>
                <br>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
