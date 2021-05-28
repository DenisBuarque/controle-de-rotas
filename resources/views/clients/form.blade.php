
<div class="shadow overflow-hidden sm:rounded-md">

    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-2">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Nome: *') }}" />
                <x-jet-input type="text" name="name" value='{{ $client->name ?? old("name") }}' id="name" maxlength="50" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="phone" value="{{ __('Telefone:') }}" />
                <x-jet-input type="text" name="phone" value='{{ $client->phone ?? old("phone") }}' id="phone" maxlength="9" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-5">
                <x-jet-label for="address" value="{{ __('Endereço: *') }}" />
                <x-jet-input type="text" name="address" value='{{ $client->address ?? old("address") }}' id="address" maxlength="256" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-1">
                <x-jet-label for="number" value="{{ __('Nº: *') }}" />
                <x-jet-input type="text" name="number" value='{{ $client->number ?? old("number") }}' id="number" maxlength="5" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="address_complement" value="{{ __('Complemento endereço:') }}" />
                <x-jet-input type="text" name="address_complement" value='{{ $client->address_complement ?? old("address_complement") }}' id="address_complement" maxlength="256" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="postal_code" value="{{ __('Código postal: *') }}" />
                <x-jet-input type="text" name="postal_code" value='{{ $client->postal_code ?? old("postal_code") }}' id="postal_code" maxlength="9" onkeypress="mascara(this, '#####-###')" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                <x-jet-label for="district" value="{{ __('Bairro: *') }}" />
                <x-jet-input type="text" name="district" value='{{ $client->district ?? old("district") }}' id="district" maxlength="50" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                <x-jet-label for="city" value="{{ __('Cidade: *') }}" />
                <x-jet-input type="text" name="city" value='{{ $client->city ?? old("city") }}' id="city" maxlength="50" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                <x-jet-label for="state" value="{{ __('Estado: *') }}" />
                <x-jet-input type="text" name="state" value='{{ $client->state ?? old("state") }}' id="state" maxlength="2" class="block mt-1 w-full" />
            </div>
        </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-jet-button class="ml-4">
            {{ __('Salvar dados') }}
        </x-jet-button>
    </div>
</div>