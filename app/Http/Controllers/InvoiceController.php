<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\Invoice;
use App\Models\State;
use App\Models\Product;
use App\Models\ProInvoiceduct;
use Illuminate\Http\Request;
use App\Models\InvoiceLineItem;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //return invoice view
        
        return view('invoice.index', [
            'products' => Product::All(),
            'states' => State::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return 'solicitud si llego';
        //dd($request->all());
        //
        /*$invoice = Invoice::create([
            'name' => "controlles",
            'user_id' => 2,
            'total' => json($request->invoice_totalp),
            'invoice_date' => json($request->invoice_date)
        ]);*/

        //Guarda en tablas relacionadas
       /* foreach($request->tablaItemsBody as $item) {
            /*[
                'product_id' => 1,
                'service_id' => 1,
                'unit_price' => 10,
                'total_price' => 100,
                'quantity' => 10
            ];
            /*var itemList = new InvoiceLineItem {
                'idInvoice' => $invoice.id;

            }
            $invoice->invoiceLineItems()->create($item);    
        }*/
        

        //return redirect(route('invoice.index'));
        // Procesa los datos recibidos del cliente

    // Obtén el valor que deseas retornar
    //$valor = "¡Hola desde el controlador 2!";

    // Crea un array con el valor
    /*$data = [
        'resultado' => $valor
    ];*/

    //$elementtoo = new Invoice;

    //$elementtoo->invoice_date= $request->

    // Retorna la respuesta JSON
    //return response()->json(['mensaje' => "se guardo"]);
    $puserr = $request->user()->id;
    
    $invoicep = Invoice::create([
        'user_id' => $puserr,
        'state_id'=> $request->invoice_state,
        'total' => $request->invoice_totalp,
        'invoice_date' => $request->invoice_date
    
    ]);
    //Guarda en tablas relacionadas
       /*foreach($request->invoice_itemsp as $item){
            $invoicep->invoiceLineItems()->create($item);
       }*/
    //$invoicep->state()->create($request->invoice_state);
    //$invoicep->user()->puserr;
    /*$invoiceN = new Invoice;
    $invoiceN->invoice_date = $request->invoice_date;
    $invoiceN->total = $request->invoice_totalp;
    $invoiceN->save();*/

    //$request->user()->invoice()->create($invoiceN);

    return response()->json($request->all());

}

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    
    /**
     * product data filling in invoice items
     */
    public function productDataFilling(Request $request){
        if(isset($request->id)){
            $productDetail = Product::find($request->id);
            return response()->json(
                [
                    'productDetails' => $productDetail,
                    'success' => true
                ]
                );
        }  else{
            return response()->json(
                [
                    'success' => false
                ]
                );
        }
    }

    /**
     * Charge items an invoice
     */
    public function addItemInvoice(Request $request): RedirectResponse
    {
        $collectionItem = collect();
        $item = json([
            'item' => $request->selectProduct,
            'quantity' => $request->quantity,
            'totalValue' => $request->selectProduct->price * $request->quantity
        ]);
        $collectionItem->add($item);
    }
}
