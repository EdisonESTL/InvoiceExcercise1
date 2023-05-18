<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_service',
        'description',
        'price'
    ];
    
    //relation inverse
    public function invoicelineitem(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
