<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceHead extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
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
    public function invoiceLines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_head_id', 'id');
    }
}
