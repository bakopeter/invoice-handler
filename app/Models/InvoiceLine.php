<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceLine extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function InvoiceHead(): BelongsTo
    {
        return $this->belongsTo(InvoiceHead::class, "invoice_head_id", "id");
    }
}
