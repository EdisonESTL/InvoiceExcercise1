<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'state_id',
        'invoice_date',
        'total'
    ];

    public function invoiceLineItems(): HasMany
    {
        return $this->hasMany(Invoicelineitem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    //relation with State
    public function state(): HasOne
    {
        return $this->hasOne(State::class);
    }
}
