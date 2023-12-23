<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductTag extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'product_tags';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id','tag_id'];
    
}
