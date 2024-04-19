<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceHead extends Model
{
    use HasFactory;

    protected $table = "invoicehead";
    public $timestamps = false;
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(TaxPayer::class, "supplier_id");
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(TaxPayer::class, "customer_id");
    }
    public function invoiceDetail(): BelongsTo
    {
        return $this->belongsTo(InvoiceDetail::class, "invoicedetailes_id");
    }
}
