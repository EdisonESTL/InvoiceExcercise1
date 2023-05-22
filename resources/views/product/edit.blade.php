<x-app-layout>
    <div class="max-w-md mx-auto p-8 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('product.update', $product) }}" >
            @csrf     
            @method('patch')       
            <div class="content-center">
                <x-input-label :value="__('ProductName')"></x-input-label>
                <x-text-input id="name" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="name" 
                    :value="old('name', $product->name)" 
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                
            </div>
            
            <div>
                <x-input-label :value="__('Product Description')"></x-input-label>
                <textarea
                    name="description"
                    placeholder="{{ __('product descripcion') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description', $product->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                
            </div>
            
            <div>
                <x-input-label :value="__('Product Price')"></x-input-label>
                <x-text-input id="price" 
                    class="block mt-1 w-full" 
                    type="number" 
                    name="price" 
                    :value="old('price', $product->price)" 
                    required/>
                <x-input-error :messages="$errors->get('productPrice')" class="mt-2" />
                
            </div>
            
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('product.index') }}">{{ __('Cancel') }}</a>
            </div>    
        </form>

    </div>
</x-app-layout>