<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['category_id', 'author_id', 'name', 'slug', 'image', 'prices',
             'discount', 'description', 'detail', 'metadata', 'trending', 'view', 'status', 'created_at', 'updated_at'];
}
