<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerReturnDetails extends Model
{
    use HasFactory, Notifiable;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
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
    }
}
