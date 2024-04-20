<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceHead extends Model
{
    use HasFactory;

    public $timestamps = false;
    //protected $table = 'invoice_heads';
    public function supplierTP(): BelongsTo
    {
        return $this->belongsTo(TaxPayer::class, 'supplier_id', 'id');
    }
    public function customerTP(): BelongsTo
    {
        return $this->belongsTo(TaxPayer::class, 'customer_id', 'id');
    }
    public function invoiceDetail(): BelongsTo
    {
        return $this->belongsTo(InvoiceDetail::class, 'invoicedetails_id', 'id');
    }
    public function invoiceLine(): HasMany
    {
        return $this->hasMany(InvoiceLine::class);
    }
}
