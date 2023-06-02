<x-app-layout>
    <div class="max-w-md mx-auto p-8 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('state.store') }}" >
            @csrf            
            <div class="content-center">
                <x-input-label :value="__('State name')"></x-input-label>
                <x-text-input id="nameState" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="nameState" 
                    :value="old('nameState')" 
                    required autofocus autocomplete="nameState" />
                <x-input-error :messages="$errors->get('nameState')" class="mt-2" />
                
            </div>
            
            <div>
                <x-input-label :value="__('State Description')"></x-input-label>
                <textarea
                    name="descriptionSate"
                    placeholder="{{ __('descriptionSate') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('descriptionSate') }}</textarea>
                <x-input-error :messages="$errors->get('descriptionSate')" class="mt-2" />
                
            </div>
            
            <x-primary-button class="mt-4">{{ __('Add state') }}</x-primary-button>
                
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($states as $st)
                <div class="p-6 flex space-x-2">                   
                    <div class="flex-1"> 
                        <div class="flex justify-between items-center">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('state.edit', $st)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('state.destroy', $st) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('state.destroy', $st)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>                       
                        <x-input-label :value="__('Product')"></x-input-label>
                        <p class="mt-4 text-lg text-gray-900">{{ $st->name }}</p>
                        <x-input-label :value="__('Description')"></x-input-label>
                        <p class="mt-4 text-lg text-gray-900">{{ $st->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>