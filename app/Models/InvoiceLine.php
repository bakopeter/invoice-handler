<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceLine extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    public function InvoiceHead(): BelongsTo
    {
        return $this->belongsTo(InvoiceHead::class, "invoice_head_id", "id");
    }
}
