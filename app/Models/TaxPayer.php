<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxPayer extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    /*
    protected $fillable = [

    ];
    */
    protected $guarded = [];
    public function taxNumber(): BelongsTo
    {
        return $this->belongsTo(TaxNumber::class, 'taxnumber_id','id');
    }
    public function groupMemberTaxNumber(): BelongsTo
    {
        return $this->belongsTo(TaxNumber::class, 'groupmember_taxnumber_id','id');
    }
    public function invoiceHeadSupplier(): HasMany
    {
        return $this->hasMany(InvoiceHead::class, 'supplier_id', 'id');
    }
    public function invoiceHeadCustomer(): HasMany
    {
        return $this->hasMany(InvoiceHead::class, 'customer_id', 'id');
    }
}
