<x-app-layout>
    <div class="max-w-2/6 mx-auto p-4 sm:p-6 lg:p-8 flex flex-col justify-center">
        <div class="content-center basis-4/5">
            <x-input-label :value="__('Facturar')" 
                class="text-xl text-center"></x-input-label>
            
        </div>

        <form
        name="mainForm"
        id="mainForm"
        class="grid grid-cols-2 basis-4/5 gap-4">
            @csrf
            
            <div class="content-center">
                <div class="w-44 mx-auto">
                    <x-input-label :value="__('Fecha')" class="text-center"></x-input-label>
                    <x-text-input id="invoiceDate" 
                        class="block mt-1 w-full" 
                        type="date" 
                        name="invoiceDate" 
                        :value="old('invoiceDate')" 
                        autofocus autocomplete="invoiceDate" />
                    <x-input-error :messages="$errors->get('invoiceDate')" class="mt-2" />
                    
                </div>
                <x-input-label :value="__('Datos de la empresa')" 
                    class="text-xl p-4"></x-input-label>

                <div >
                    <x-input-label :value="__('Nombre Empresa')"></x-input-label>
                    <x-text-input id="nameCompany" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="nameCompany" 
                        :value="old('nameCompany')" 
                        autofocus autocomplete="nameCompany" />
                    <x-input-error :messages="$errors->get('nameCompany')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Dirección')"></x-input-label>
                    <x-text-input id="directionCompany" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="directionCompany" 
                        :value="old('directionCompany')" 
                        autofocus autocomplete="directionCompany" />
                    <x-input-error :messages="$errors->get('directionCompany')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Telefono')"></x-input-label>
                    <x-text-input id="telephoneCompany" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="telephoneCompany" 
                        :value="old('telephoneCompany')" 
                        autofocus autocomplete="telephoneCompany" />
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
                        autofocus autocomplete="nameCustomer" />
                    <x-input-error :messages="$errors->get('nameCustomer')" class="mt-2" />
                    
                </div>
    
                <!--<div>
                    <x-input-label :value="__('Nombre empresa')"></x-input-label>
                    <x-text-input id="nameCompanyClient" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="nameCompanyClient" 
                        :value="old('nameCompanyClient')" 
                        autofocus autocomplete="nameCompanyClient" />
                    <x-input-error :messages="$errors->get('nameCompanyClient')" class="mt-2" />
                    
                </div>-->
    
                <div>
                    <x-input-label :value="__('Dirección')"></x-input-label>
                    <x-text-input id="directionCustomer" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="directionCustomer" 
                        :value="old('directionCustomer')" 
                        autofocus autocomplete="directionCustomer" />
                    <x-input-error :messages="$errors->get('directionCustomer')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Telefono')"></x-input-label>
                    <x-text-input id="telephoneCustomer" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="telephoneCustomer" 
                        :value="old('telephoneCustomer')" 
                        autofocus autocomplete="telephoneCustomer" />
                    <x-input-error :messages="$errors->get('telephoneCustomer')" class="mt-2" />
                    
                </div>
    
                <div>
                    <x-input-label :value="__('Correo')"></x-input-label>
                    <x-text-input id="emailCustomer" 
                        class="block mt-1 w-full" 
                        type="number" 
                        name="emailCustomer" 
                        :value="old('emailCustomer')" 
                        autofocus autocomplete="emailCustomer" />
                    <x-input-error :messages="$errors->get('emailCustomer')" class="mt-2" />
                    
                </div>
            </div>

            <div class="col-span-2 ">
                <div class="w-1/3 mx-auto grid grid-cols-2 text-center">
                    <x-input-label :value="__('Añadir elementos a factura')" 
                        class="p-4 text-xl col-span-2"/>
                    <div class="p-4">
                        <x-input-label :value="__('Articulo')"></x-input-label>
                        <select id="selectProduct" onchange="test(event)"
                        name="selectProduct">
                            <option value=0>select an option</option>
                            @foreach($products as $product)
                            <option value={{$product->id}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-4">
                        <x-input-label :value="__('Cantidad')"></x-input-label>
                        <x-text-input id="quantity" onchange="totalPayablePerProduct()"
                         
                        type="number" 
                        name="quantity" 
                        :value="old('quantity')"/>
                    </div>
                    
                    <button class="w-2/4 col-span-2 mx-auto" onclick="load(event)">Add</button>
                </div>
            </div>

            <table id="tablaItems" name="tablaItems"
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
                <tbody id="tablaItemsBody" name="tablaItemsBody" class="text-center">     
                    
                </tbody>
                <tfoot id="tablaFooter"
                name="tablaFooter">
                    <tr>
                        <td colspan="4" class="text-right">Subtotal</td>
                        <td id="subTotal" name="subTotal"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Descuento</td>
                        <td> <x-text-input id="discount" 
                            class="block mt-1 w-full" 
                            type="number" 
                            name="discount" 
                            step="0.01" min="1"
                            onchange="discountSubtotal()" /></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Subtotal con descuento</td>
                        <td id="subtotalDiscount" name="subtotalDiscount"> </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">IVA</td>
                        <td id="ivaTotal" name="ivaTotal"> </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">
                            <h4>Total</h4></td>
                        <td id="totalInvoice"
                        name="totalInvoice">                            
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
const copyArrayItems = [];
let mainForm = document.getElementById("mainForm");
var i = 0;

//Charge item in list items of invoice
async function load(evnt) {
    //
    evnt.preventDefault();
    //arrayItems.length=0;

    //select values of elements html
    const elementi = document.getElementById('selectProduct').value;
    const quantity = document.getElementById('quantity').value;

    //create object json
    var item = {
        "id": i,
        "element": jsonDataProducts,
        "quantity": quantity,
        "unitTotal": jsonDataProducts.price * quantity
    }

    //add object an array
    arrayItems.push(item);
    copyArrayItems.push(item);

   //charge items an table
   chargeTable();

    //clear camps
    document.getElementById('selectProduct').selectedIndex=0;
    document.getElementById('quantity').value="";
    
    i += 1;
}

function addSubTotal(){
    var addition = 0;
    if(arrayItems.lenght!=0){
        arrayItems.forEach(function(item){
        addition += item.unitTotal;
        })
        
        document.getElementById('subTotal').textContent=addition;
    } else{
        document.getElementById('subTotal').textContent=0;

    }
    
}

function discountSubtotal(){
    var subtotal = document.getElementById('subTotal').textContent;    
    var discnt = document.getElementById('discount').value;
    document.getElementById('subtotalDiscount').textContent=subtotal-discnt;

    ivaTotal();
}

function ivaTotal(event){
    
    var subtotal = parseFloat(document.getElementById('subtotalDiscount').textContent);
    var ivaEcuador = 0.12;
    var ivaValue = parseFloat(subtotal * ivaEcuador);
    var total = ivaValue + subtotal;
    document.getElementById('ivaTotal').textContent=ivaValue;
    document.getElementById('totalInvoice').textContent=total;
}

function deleteItem(value){
    
    var itema = value.currentTarget.data.element;
    //window.alert(value.currentTarget.data);
    //console.log(itema);
    //arrayItems
    //var newList = arrayItems.splice(findIndex(x => x = value),1);
    //var newList = arrayItems.filter(x => x.id = value.id);
    //arrayItems = newList;
    //console.log('arrayItems.length funcncio delete');
    //console.log(arrayItems.length);
    /*console.log('CopyArrayItems.length');
    console.log(copyArrayItems.length);
    copyArrayItems.forEach((itt) =>{
        console.log(itt);

    });*/
    //var idx = copyArrayItems.findIndex(x => x.id === itema.id);
    //console.log(idx);

    arrayItems.splice(arrayItems.findIndex(x => x.element.id === itema.id),1);
    arrayItems.forEach((itt) =>{
        console.log(itt);

    })
    chargeTable();
    //return false;
}

function chargeTable(){
    //select body table for view items
    var bodyTabla = document.getElementById("tablaItemsBody");

    //clear table
    bodyTabla.innerHTML = "";

    //charge data
    arrayItems.forEach((elementt) => {

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
        celdaQuantity.textContent = elementt.quantity;
        fila.appendChild(celdaQuantity);

        var celdaPrice = document.createElement("td");
        celdaPrice.textContent = elementt.element.price;
        fila.appendChild(celdaPrice);

        var celdaTotal = document.createElement("td");
        celdaTotal.textContent = elementt.element.price * elementt.quantity;
        fila.appendChild(celdaTotal);

        var celdaOptions = document.createElement("td");
        var btnDelete = document.createElement("button");
        btnDelete.setAttribute("type", "button"); 
        btnDelete.textContent="Eliminar";  
        btnDelete.data = elementt;
        btnDelete.addEventListener("click",deleteItem, false);

        celdaOptions.appendChild(btnDelete);
        fila.appendChild(celdaOptions);

        //add row to body table
        bodyTabla.appendChild(fila);

        });
    //add sub total value
    addSubTotal();  
    discountSubtotal();
    ivaTotal();
}

function saveInvoice(event){
    //console.log('hola ');
    event.preventDefault();
    var form = document.getElementById('mainForm');
    var formData = new FormData(form);
    console.log(formData);
    
    //var form = document.getElementById('mainForm');
    // Crea un campo oculto
    //var inputObjetos = document.createElement('input');
    //inputObjetos.type = 'hidden';
    //inputObjetos.valueItems = JSON.stringify(arrayItems);

    // Agrega el campo oculto al formulario
    //form.appendChild(inputObjetos);
    return false;
}

var token = document.head.querySelector("[name~=csrf-token][content]").content;

mainForm.addEventListener("submit", (e) => {
    e.preventDefault();
    //console.log(token);
    var form = document.getElementById('mainForm');
    // Obtener el token de la etiqueta meta
    
    var invoice_date = document.getElementById('invoiceDate').value;
    var customer_name = document.getElementById('nameCustomer').value;
    var customer_direction = document.getElementById('directionCustomer').value;
    var customer_telephone = document.getElementById('telephoneCustomer').value;
    var customer_mail = document.getElementById('emailCustomer').value;
    var invoice_items = arrayItems;
    var invoice_subtotal = document.getElementById('subTotal').textContent;
    var invoice_discount = document.getElementById('discount').textContent;
    var invoice_subtotaldisc = document.getElementById('subtotalDiscount').textContent;
    var invoice_iva = document.getElementById('ivaTotal').textContent;
    var invoice_total = document.getElementById('totalInvoice').textContent;
    
    var datas = {
        invoice_date: invoice_date,
        customer_namep: customer_name,
        customer_directionp: customer_direction,
        customer_telephonep: customer_telephone,
        customer_mailp: customer_mail,
        invoice_itemsp: invoice_items,
        invoice_subtotalp: invoice_subtotal,
        invoice_discountp: invoice_discount,
        invoice_subtotaldiscp: invoice_subtotaldisc,
        invoice_ivap: invoice_iva,
        invoice_totalp: invoice_total
    };
    console.log('datas');
    console.log(datas);
    //console.log(datas);
    fetch('/invoice', {
        method: 'POST', 
        headers:{
            'Content-Type': 'application/json',
            'X-CSRF-Token': token
        },
        body:{ 
            data: datas
        }
    }).then(response => response.json())
  .then(data  => {
    // Hacer algo con la respuesta
    console.log(data);
    console.log('datas');
    console.log(datas);
  })
  .catch(error => {
    // Manejar errores
    console.error('Error:', error);
  });
})

</script>