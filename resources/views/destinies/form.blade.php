
<div class="shadow overflow-hidden sm:rounded-md">

    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-2">
            <div class="col-span-6 sm:col-span-6">
                <fieldset>
                    <legend class="text-base font-medium text-gray-900">Status da Rota</legend>
                    <div class="mt-4 space-y-4">
                      <div class="flex items-start">
                        <div class="flex items-center h-5">
                            @php
                                $checked = '';
                                if(isset($destiny->checked)) {
                                    if($destiny->checked == 'Active' || $destiny->checked == 'Finish'){
                                        $checked = 'checked';
                                    }
                                }
                            @endphp
                          <input name="checked" {{ $checked }} value='Active' type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="comments" class="font-medium text-gray-700">Rota ativa</label>
                          <p class="text-gray-500">Selecione está opção para incluir o destino na lista de rotas no mapa.</p>
                        </div>
                      </div>
                </fieldset>
            </div>
    
            <div class="col-span-6 sm:col-span-6">
                <label for="client_id" class="block text-sm font-medium text-gray-700">Destino: *</label>
                <select id="client_id" name="client_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecione o endereço de destino.</option>
                    @foreach ($clients as $value)
                        @php
                            $selected1 = '';
                            if(isset($destiny->client_id) && $destiny->client_id == $value->id) {
                                $selected1 = 'selected';
                            }
                        @endphp
                        <option {{ $selected1 }} value="{{ $value->id }}">{{ $value->name }} - {{ $value->address }}, {{ $value->number }}, {{ $value->district }}, ({{ $value->address_complement }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-6">
                <label for="service_id" class="block text-sm font-medium text-gray-700">Serviço: *</label>
                <select id="service_id" name="service_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecione o tipo de serviço.</option>
                    @foreach ($services as $value)
                        @php
                            $selected2 = '';
                            if(isset($destiny->service_id) && $destiny->service_id == $value->id) {
                                $selected2 = 'selected';
                            }
                        @endphp    
                    <option {{ $selected2 }} value="{{ $value->id }}">R$ {{ $value->price }} - {{ $value->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-6">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Responsável: *</label>
                <select id="user_id" name="user_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecione o nome do responsável pela rota.</option>
                    @foreach ($users as $value)
                        @php
                            $selected3 = '';
                            if(isset($destiny->user_id) && $destiny->user_id == $value->id) {
                                $selected3 = 'selected';
                            }
                        @endphp 
                        <option {{ $selected3 }} value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-jet-button class="ml-4">
            {{ __('Salvar dados') }}
        </x-jet-button>
    </div>
</div>