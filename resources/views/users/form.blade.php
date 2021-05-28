
<div class="shadow overflow-hidden sm:rounded-md">

    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-2">
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="name" value="{{ __('Nome:') }}" />
                <x-jet-input type="text" name="name" value="{{ $user->name ?? old('name') }}" id="name" maxlength="50" class="block mt-1 w-full" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="email" value="{{ __('E-mail:') }}" />
                <x-jet-input type="email" name="email" value="{{ $user->email ?? old('email') }}" id="email" maxlength="100" class="block mt-1 w-full" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <label for="permission" class="block text-sm font-medium text-gray-700">Permissões:</label>
                <select id="permission" name="permission[]" autocomplete="permission" multiple class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($permissions as $value)
                    @php
                        $selected = '';
                        if( old('permission') ):
                            foreach ( old('permission') as $key => $value2 ):
                                if($value->id == $value2->id ):
                                    $selected = 'selected';
                                endif;
                            endforeach;
                        else:
                            if( isset($user) ) 
                            {
                                foreach( $user->permissions as $key => $permission):
                                    if($permission->id == $value->id):
                                        $selected = "selected";
                                    endif;
                                endforeach;
                            }
                        endif;
                    @endphp    
                    <option {{ $selected }} value='{{ $value->id }}'>{{ $value->description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="password" value="{{ __('Senha:') }}" />
                <x-jet-input type="password" name="password" id="password" maxlength="20" class="block mt-1 w-full" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="password_confirmation" value="{{ __('Confirme a senha:') }}" />
                <x-jet-input type="password" name="password_confirmation" id="password_confirmation" maxlength="20" class="block mt-1 w-full" />
            </div>

        </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-jet-button class="ml-4">
            {{ __('Salvar dados') }}
        </x-jet-button>
    </div>
</div>