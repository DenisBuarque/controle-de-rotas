
<div class="shadow overflow-hidden sm:rounded-md">

    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-2">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Tipo de seriço:') }}" />
                <x-jet-input type="text" name="name" value="{{ $service->name ?? old('name') }}" id="name" maxlength="50" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="price" value="{{ __('Valor:') }}" />
                <x-jet-input type="text" name="price" value="{{ $service->price ?? old('price') }}" id="price" onkeyup="moeda(this);" maxlength="10" placeholder="0.00" class="block mt-1 w-full" />
            </div>
        </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-jet-button class="ml-4">
            {{ __('Salvar dados') }}
        </x-jet-button>
    </div>
</div>