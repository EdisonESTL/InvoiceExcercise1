<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'invoice_line_items_products_id'
    ];

    //relation inverse
    public function invoicelineitem(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
