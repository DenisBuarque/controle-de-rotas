<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-1 p-1">

        <div class="grid grid-cols-2 gap-1">
            <div class='col-span-2 md:col-span-1'>
                <select wire:model="limit" class='px-1 py-2 rounded border-gray-300 w-full md:w-20'>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='20'>20</option>
                </select>
                <input type="search" wire:model="search" value="" id="search" maxlength="20" placeholder="Buscar..." class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full md:w-52" />
            </div>
            <div class='col-span-2 md:col-span-1'>
                <a href="{{ route('destinies.create') }}" title="Clique para cadastrar novo registro" class="bg-green-600 hover:bg-green-900 px-4 py-2 text-white rounded text-center block md:w-44 md:float-right">
                    Novo Registro
                </a>
            </div>
        </div>

    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Destinos
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Serviço
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Responsável
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-40">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($destinies as $key => $value)
                                        @php
                                            if (($key % 2) === 0):
                                                $divisao = '';
                                            else:
                                                $divisao = 'bg-gray-50';
                                            endif
                                        @endphp
                                        <tr class='{{ $divisao }}'>
                                            <td class="px-6 py-2">
                                                <div class="text-sm text-gray-900 ">{{ $value->client->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $value->client->address.', nº '.$value->client->number.', '.$value->client->district.', '.$value->client->address_complement }}</div>
                                            </td>
                                            <td class="px-6 py-2">
                                                {{ $value->service->name }}
                                            </td>
                                            <td class="px-6 py-2">
                                                {{ $value->user->name }}
                                            </td>
                                            <td class="px-6 py-2">
                                                @if($value->checked == 'Inative')
                                                    Inative
                                                @elseif($value->checked == 'Active')
                                                    Active
                                                @else
                                                    Finished
                                                @endif
                                            </td>
                                            <td class="px-6 py-2 text-center text-sm font-medium">
                                                <a href="{{ route('destinies.edit', $value->id) }}" title="Clique para alterar o registro" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{ route('destinies.show', $value->id) }}" title="Clique para excluir o registro" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan='5' class="px-6 py-4">Nenhum registro encontrado.</td>
                                    </tr>
                                    @endforelse
                                <!-- More people... -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan='5' class="px-6 py-4">
                                            @if($destinies)
                                                {{ $destinies->links() }}
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- This example requires Tailwind CSS v2.0+ -->

        </div>
    </div>

</div>
