<x-app-layout>
    <div class="max-w-2/6 mx-auto p-4 sm:p-6 lg:p-8 flex flex-col justify-center">
        <div class="content-center basis-4/5">
            <x-input-label :value="__('Facturar')" 
                class="text-xl text-center"></x-input-label>
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
                <x-input-label :value="__('Datos de la empresa')" 
                    class="text-xl p-4"></x-input-label>

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
                <x-input-label :value="__('Datos del cliente')" 
                    class="text-xl p-4"></x-input-label>
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
            <div class="col-span-2 ">
                <div class="w-3/4 mx-auto grid grid-cols-2 text-center">
                    <x-input-label for="text" :value="__('Añadir elementos a factura')" 
                        class="p-4 text-xl col-span-2"/>
                    
                    <select id="selectProduct" onchange="test(event)"
                        name="selectProduct"
                        class="m-4">
                        <option value=0>select an option</option>
                        @foreach($products as $product)
                        <option value={{$product->id}}>{{$product->name}}</option>
                        @endforeach
                    </select>
                    <td><x-text-input id="quantity" onchange="totalPayablePerProduct()"
                        class="m-4" 
                        type="number" 
                        name="quantity" 
                        :value="old('quantity')"/></td>
                    <button class="w-2/4 col-span-2 mx-auto" onclick="load(event)">Add</button>
                </div>
            </div>
            <div id="">
            </div>
            <table id="tablaItems" 
                class="col-span-2 table-auto p-4 mx-auto border-separate border border-slate-400">
                <thead>
                    <tr>
                        <th class="p-2">Producto</th>
                        <th class="p-2">Descripcion</th>
                        <th class="p-2">Cantidad</th>
                        <th class="p-2">Precio unitario</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaItemsBody" class="text-center">     
                    
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
            </table>
            <div class="col-span-2 justify-center">
                <x-primary-button class="mt-4 w-64">{{ __('Guardar') }}</x-primary-button>
                <x-primary-button class="mt-4 w-64">{{ __('Imprimir') }}</x-primary-button>
            </div>
            
        </form>
        
    </div>
</x-app-layout>

<script>

//var for store element's atributes selected
var jsonDataProducts={};

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
        jsonDataProducts=jsonData.productDetails;

        //document.getElementById('description').value = dataProduct.description;
        //document.getElementById('price').value = dataProduct.price;

        console.log(jsonData.productDetails)
        console.log(jsonDataProducts)
    }
    
}

//calculated product's unit total value 
async function totalPayablePerProduct(){
    //const quantity = document.getElementById('quantity').value;
    //const priceUnit = document.getElementById('price').value;

    //document.getElementById('totalValue').value = quantity*priceUnit;    
}

//create array
    const arrayItems = [];

//Charge item in list items of invoice
async function load(evnt) {
    //
    evnt.preventDefault();
    arrayItems.length=0;
    //select values of elements html
    const elementi = document.getElementById('selectProduct').value;
    const quantity = document.getElementById('quantity').value;

    //create object json
    var item = {
        "element": jsonDataProducts,
        "quantity": quantity,
        "unitTotal": jsonDataProducts.price * quantity
    }

    console.log(item);
    //add object an array
    arrayItems.push(item);

    //select table for view items
    var tabla = document.getElementById('tablaItems');
    //var bodyTabla = tabla.querySelector("bodyTabla");
    //select body table for view items
    var bodyTabla = document.getElementById("tablaItemsBody");

    //trigger rows and cols
    arrayItems.forEach((elementt) => {
        console.log(elementt);
        //trigger row
        var fila = document.createElement("tr");

        //trigger cols of data
        var celdaName = document.createElement("td");
        celdaName.textContent = elementt.element.name;
        fila.appendChild(celdaName);

        var celdaDescription = document.createElement("td");
        celdaDescription.textContent = elementt.element.description;
        fila.appendChild(celdaDescription);

        var celdaQuantity = document.createElement("td");
        celdaQuantity.textContent = quantity;
        fila.appendChild(celdaQuantity);

        var celdaPrice = document.createElement("td");
        celdaPrice.textContent = elementt.element.price;
        fila.appendChild(celdaPrice);

        var celdaTotal = document.createElement("td");
        celdaTotal.textContent = elementt.element.price * quantity;
        fila.appendChild(celdaTotal);

        //add row to body table
        bodyTabla.appendChild(fila);

        //clear camps
        document.getElementById('selectProduct').selectedIndex=0;
        document.getElementById('quantity').value="";

        //console.log(elementt);
        console.log(fila);
    });
    
    var subTotal = arrayItems.reduce((acumulador, obj) => acumulador + obj.unitTotal, 0);
    console.log(subTotal);
}

   
</script>