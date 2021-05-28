<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários List') }}
        </h2>
    </x-slot>

    <div class="py-3">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-1">
            @if (session('alert'))
                <div class="bg-green-200 border-green-400 border-2 p-5 mb-3 rounded">
                    {{ session('alert') }}
                </div>
            @endif

            @if (session('erro'))
                <div class="bg-red-200 border-red-400 border-2 p-5 mb-3 rounded">
                    {{ session('erro') }}
                </div>
            @endif
        </div>

        <livewire:users.user-index />

        
    </div>
</x-app-layout>
