<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_images';
    protected $primaryKey = 'id';
    protected $fillable = ['image_name','image_path','product_id'];
}

