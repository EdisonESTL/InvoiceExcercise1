<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

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
    public function store(Request $request): RedirectResponse
    {
        //
        $invoice = Invoice::create([
            'total' => $request->totalInvoice,
            'invoice_date' => $request->invoiceDate
        ]);

        dd($request);

        //Guarda en tablas relacionadas
        foreach($request->items as $item) {
            /*[
                'product_id' => 1,
                'service_id' => 1,
                'unit_price' => 10,
                'total_price' => 100,
                'quantity' => 10
            ];
            $table->integer('quantity');
            $table->foreignId('invoice_id');
            $table->foreignId('product_id');
            $table->foreignId('service_id');
            $table->foreignId('state_id');
            $table->decimal('unit_price', $precision = 8, $scale = 2);
            $table->decimal('total_price', $precision = 8, $scale = 2);*/
            $invoice->invoiceLineItems()->create($item);    
        }
        

        return redirect(route('invoice.index'));
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
