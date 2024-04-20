<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function invoiceHead(): HasOne
    {
        return $this->hasOne(InvoiceHead::class);
    }
}
