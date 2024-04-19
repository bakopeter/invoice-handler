<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxPayer extends Model
{
    use HasFactory;

    //protected $table = "tax_payers";
    public $timestamps = false;
    public function taxNumber(): BelongsTo
    {
        return $this->belongsTo(TaxNumber::class);
    }
}
