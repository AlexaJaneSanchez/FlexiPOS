<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'productID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'productcategory',
        'productname',
        'brandname',
        'wholesaleunit',
        'retailunit',
        'retailqtyperwholesaleunit',
        'reorderpoint',
        'markup',
        'isactive',
        'quantityonhand',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'wholesaleunit' => 'decimal:2',
        'retailunit' => 'decimal:2',
        'retailqtyperwholesaleunit' => 'integer',
        'reorderpoint' => 'integer',
        'markup' => 'decimal:2',
        'isactive' => 'boolean',
        'quantityonhand' => 'integer',
    ];
}
