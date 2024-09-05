<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesInvoiceDetails extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'salesinvoiceid',
        'productid',
        'quantitysold',
        'unitprice',
        'discounts',
        'taxamount',
        'totalamount',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'salesinvoiceid',
            'productid',
            'quantitysold',
            'unitprice',
            'discounts',
            'taxamount',
            'totalamount',
            'created_at',
            'updated_at',
        ];
    }
}
