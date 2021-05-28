<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mapa de rotas') }}
        </h2>
    </x-slot>

    <div class="p-1">

        <livewire:map.map-index/>

    </div>
</x-app-layout>
