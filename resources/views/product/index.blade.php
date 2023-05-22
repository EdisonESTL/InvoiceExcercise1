<x-app-layout>
    <div class="max-w-md mx-auto p-8 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('product.store') }}" >
            @csrf            
            <div class="content-center">
                <x-input-label :value="__('ProductName')"></x-input-label>
                <x-text-input id="productName" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                
            </div>
            
            <div>
                <x-input-label :value="__('Product Description')"></x-input-label>
                <textarea
                    name="description"
                    placeholder="{{ __('product descripcion') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                
            </div>
            
            <div>
                <x-input-label :value="__('Product Price')"></x-input-label>
                <x-text-input id="price" 
                    class="block mt-1 w-full" 
                    type="number" 
                    name="price" 
                    :value="old('price')" 
                    required/>
                <x-input-error :messages="$errors->get('productPrice')" class="mt-2" />
                
            </div>
            
            <x-primary-button class="mt-4">{{ __('menu.producto') }}</x-primary-button>
                
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($product as $produc)
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
                                    <x-dropdown-link :href="route('product.edit', $produc)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('product.destroy', $produc) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('product.destroy', $produc)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>                       
                        <x-input-label :value="__('Product')"></x-input-label>
                        <p class="mt-4 text-lg text-gray-900">{{ $produc->name }}</p>
                        <x-input-label :value="__('Description')"></x-input-label>
                        <p class="mt-4 text-lg text-gray-900">{{ $produc->description }}</p>
                        <x-input-label :value="__('Price')"></x-input-label>
                        <p class="mt-4 text-lg text-gray-900">{{ $produc->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>