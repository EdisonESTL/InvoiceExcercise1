<x-app-layout>
    <div class="max-w-2/6 mx-auto p-4 sm:p-6 lg:p-8 flex flex-col justify-center">
        <div class="content-center basis-4/5">
            <x-input-label :value="__('Facturar')" class="text-3xl text-center"></x-input-label>
            <div class="w-44">
                <x-input-label :value="__('Fecha')" class="text-center"></x-input-label>
                <x-text-input id="invoiceDate" 
                    class="block mt-1 w-full" 
                    type="date" 
                    name="invoiceDate" 
                    :value="old('invoiceDate')" 
                    required autofocus autocomplete="invoiceDate" />
                <x-input-error :messages="$errors->get('invoiceDate')" class="mt-2" />
                
            </div>
        </div>

        <form method="POST" action="{{ route('invoice.store') }}"
        class="grid grid-cols-2 basis-4/5 gap-4">
            @csrf
            <div class="content-center">
                <x-input-label :value="__('Datos de la empresa')" class="text-2xl"></x-input-label>

                <div >
                    <x-input-label :value="__('Nombre Empresa')"></x-input-label>
                    <x-text-input id="nameCompany" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="nameCompany" 
                        :value="old('nameCompany')" 
                        required autofocus autocomplete="nameCompany" />
                    <x-input-error :messages="$errors->get('nameCompany')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Dirección')"></x-input-label>
                    <x-text-input id="directionCompany" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="directionCompany" 
                        :value="old('directionCompany')" 
                        required autofocus autocomplete="directionCompany" />
                    <x-input-error :messages="$errors->get('directionCompany')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Telefono')"></x-input-label>
                    <x-text-input id="telephoneCompany" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="telephoneCompany" 
                        :value="old('telephoneCompany')" 
                        required autofocus autocomplete="telephoneCompany" />
                    <x-input-error :messages="$errors->get('telephoneCompany')" class="mt-2" />
                    
                </div>
            </div> 

            <div class="content-center">
                <x-input-label :value="__('Datos del cliente')" class="text-2xl"></x-input-label>
                <div>
                    <x-input-label :value="__('Nombre cliente')"></x-input-label>
                    <x-text-input id="nameCustomer" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="nameCustomer" 
                        :value="old('nameCustomer')" 
                        required autofocus autocomplete="nameCustomer" />
                    <x-input-error :messages="$errors->get('nameCustomer')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Nombre empresa')"></x-input-label>
                    <x-text-input id="nameCompanyClient" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="nameCompanyClient" 
                        :value="old('nameCompanyClient')" 
                        required autofocus autocomplete="nameCompanyClient" />
                    <x-input-error :messages="$errors->get('nameCompanyClient')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Dirección')"></x-input-label>
                    <x-text-input id="directionCustomer" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="directionCustomer" 
                        :value="old('directionCustomer')" 
                        required autofocus autocomplete="directionCustomer" />
                    <x-input-error :messages="$errors->get('directionCustomer')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Telefono')"></x-input-label>
                    <x-text-input id="telephoneCustomer" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="telephoneCustomer" 
                        :value="old('telephoneCustomer')" 
                        required autofocus autocomplete="telephoneCustomer" />
                    <x-input-error :messages="$errors->get('telephoneCustomer')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Correo')"></x-input-label>
                    <x-text-input id="emailCustomer" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="emailCustomer" 
                        :value="old('emailCustomer')" 
                        required autofocus autocomplete="emailCustomer" />
                    <x-input-error :messages="$errors->get('emailCustomer')" class="mt-2" />
                    
                </div>
            </div>
            
<!--
            <div class="grid grid-cols-5 gap-x-3 col-span-2">
                <div class="max-w-xs">
                    <x-input-label :value="__('Product')"></x-input-label>
                    <x-text-input id="nameProduct" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="nameProduct" 
                        :value="old('nameProduct')" 
                        required/>
                    <x-input-error :messages="$errors->get('nameProduct')" class="mt-2" />
                </div>
                
                <div class="max-w-xs">
                    <x-input-label :value="__('Description')"></x-input-label>
                    <textarea
                        name="description"
                        placeholder="{{ __('product descripcion') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="max-w-xs">
                    <x-input-label :value="__('Cantidad')"></x-input-label>
                    <x-text-input id="quantity" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="quantity" 
                        :value="old('quantity')" 
                        required/>
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>                

                <div>
                    <x-input-label :value="__('Unit Price')"></x-input-label>
                    <x-text-input id="price" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="price" 
                        :value="old('price')" 
                        required/>
                    <x-input-error :messages="$errors->get('productPrice')" class="mt-2" />
                    
                </div>

                <div class="max-w-xs">
                    <x-input-label :value="__('Total')"></x-input-label>
                    <x-text-input id="priceTotal" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="priceTotal" 
                        :value="old('priceTotal')" 
                        required/>
                    <x-input-error :messages="$errors->get('priceTotal')" class="mt-2" />
                </div>
            </div>-->
            <form method="POST" action="">
                @csrf
                <select id="selectProduct" onchange="test(event)"
                    name="selectProduct">
                    <option value=0>select an option</option>
                    @foreach($products as $product)
                    <option value={{$product->id}}>{{$product->name}}</option>
                    @endforeach
                </select>
                <td><x-text-input id="quantity" onchange="totalPayablePerProduct()"
                    class="block mt-1 w-full" 
                    type="number" 
                    name="quantity" 
                    :value="old('quantity')"/></td>
                <x-primary-button class="mt-4">{{ __('Add') }}</x-primary-button>
                
            </form>
            <table class="col-span-2 table-auto">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach ($collectionItem as $item)
                        <tr>
                            <td>
                                <x-text-input id="name"
                                class="block mt-1 w-full" 
                                type="text"  
                                :value="old('description')"
                                
                                />
                            </td>
                            <td><x-text-input id="description"
                                class="block mt-1 w-full" 
                                type="text"  
                                :value="old('description')"
                                
                                /></td>
                            <td><x-text-input id="quantity" onchange="totalPayablePerProduct()"
                                class="block mt-1 w-full" 
                                type="number" 
                                name="quantity" 
                                :value="old('quantity')"/></td>
                            <td><x-text-input id="price" 
                                class="block mt-1 w-full" 
                                type="number" 
                                name="price" 
                                :value="old('price')"
                                /></td>
                            <td><x-text-input id="totalValue" 
                                class="block mt-1 w-full" 
                                type="number" 
                                name="totalValue" 
                                :value="old('totalValue')"/></td>
                            <td><button>Botón Detalles</button></td>
                            <datalist  id="productList" dir="{{$products}}"></datalist>

                          </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Subtotal</td>
                            <td> $subto</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Descuento</td>
                            <td> $desc</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Subtotal con descuento</td>
                            <td> $subtdes</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Impuestos</td>
                            <td> $imp</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">
                                <h4>Total</h4></td>
                            <td>
                                <h4>$total</h4>
                            </td>
                        </tr>
                        </tfoot>
                </thead>
            </table>
            <div class="col-span-2 justify-center">
                <x-primary-button class="mt-4 w-64">{{ __('Guardar') }}</x-primary-button>
                <x-primary-button class="mt-4 w-64">{{ __('Imprimir') }}</x-primary-button>
            </div>
            
        </form>
        
    </div>
</x-app-layout>

<script>
//const jsonDataProducts;

async function test(data) {
    var csrf = document.querySelector('meta[name="csrf-token"]').content;
    const response = await fetch('productDataFilling',{
            method: 'POST',
            body: JSON.stringify({id : data.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrf
            }
        }).catch((err) => {
                
        });
    
    if(response.ok){
        const jsonData = await response.json()
        const dataProduct=jsonData.productDetails;
        //jsonDataProducts=jsonData.productDetails;

        document.getElementById('description').value = jsonData.productDetails.description;
        document.getElementById('price').value = dataProduct.price;

        console.log(jsonData.productDetails)
    }
    
}

async function totalPayablePerProduct(){
    const quantity = document.getElementById('quantity').value;
    const priceUnit = document.getElementById('price').value;

    document.getElementById('totalValue').value = quantity*priceUnit;
    /*var csrf = document.querySelector('meta[name="csrf-token"]').content;
    
    const response = await fetch('productDataFilling',{
            method: 'POST',
            body: JSON.stringify({quantity : data.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrf
            }
        }).catch((err) => {
                
        });*/
    
}
/*
    async function load(data) {
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        const selectElement = await fetch('productDataFilling',{
                methos: 'POST',
                body: JSON.stringify({id : data.target.value}),
                headers:{
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrf
                }
            }).then(response => {
                //console.log(response)
                //response.json()
                const jsonData = await response.json(),
                console.log(jsonData.productDetails)
            }).catch((err) => {
                
            });
    }
*/
   
</script>