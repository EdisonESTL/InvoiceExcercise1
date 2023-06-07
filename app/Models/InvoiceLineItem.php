<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceLineItem extends Model
{
    use HasFactory;

    protected $filliable = [
        'quantity',
        'invoice_id',
        'product_id',
        //'service_id',
        //'state_id',
        'unit_price',
        'total_price'
    ];
    //inverse relation
    public function invoice(): BelongsTo
    {
        return $this->BelongsTo(Invoice::class);
    }

    //relation with Product
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    //relation with Service
    /*public function service(): HasOne
    {
        return $this->hasOne(Service::class);
    }*/
}
