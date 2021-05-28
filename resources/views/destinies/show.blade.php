<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Destino Delete') }}
        </h2>
    </x-slot>

    <div class="py-3">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white mt-28 py-5 rounded shadow text-center">

            <h3 class='mb-5 text-xl'>Deseja mesmo excluir o registro {{ $destiny->client->name }}?</h3>
            <p class='mb-10'>Ao clicar em deletar registro os dados serão aparagados e não poderá ser recuperado.</p>
            
            <form action="{{ route('destinies.delete', $destiny->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('destinies.index') }}" class='border-gray-300 border-2 text-center px-5 py-3 rounded'>Não, obrigado!</a>
                <button type="submit" class='bg-red-500 border-red-700 border-2 text-center text-white p-3 rounded'>Deletar registro</button>
            </form>
            
        </div>

    </div>
</x-app-layout>
