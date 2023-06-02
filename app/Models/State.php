<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    //relation inverse
    public function invoicelineitem(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
