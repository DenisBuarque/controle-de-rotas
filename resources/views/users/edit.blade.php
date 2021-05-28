<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuário Edit') }}
        </h2>
    </x-slot>

    <div class="py-5 px-1">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class='flex'>
                <div class='flex-grow'></div>
                <div class='flex-none'>
                    <a href="{{ route('users.index') }}" title="Clique para cadastrar novo registro" class="bg-green-600 hover:bg-green-900 px-4 py-2 text-white rounded ml-1">
                        Listar Registros
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Informações de usuário</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Mantenha sempre os dados do usuário atualizado.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">

                            @if (session('alert'))
                                <div class="bg-green-200 border-green-400 border-2 p-5 mb-2 rounded">
                                    {{ session('alert') }}
                                </div>
                            @endif

                            @if (session('erro'))
                                <div class="bg-red-200 border-red-400 border-2 p-5 mb-2 rounded">
                                    {{ session('erro') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="bg-red-200 border-red-400 border-2 p-5 mb-2 rounded">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('users.form')
                            </form>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
</x-app-layout>
