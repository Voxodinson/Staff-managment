<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_instock',
        'description',
        'tag',
        'product_images'
    ];


    protected $casts = [
        'product_images' => 'array',
    ];
    

}
