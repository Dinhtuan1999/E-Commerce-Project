<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = ['name','description','image_path','image_name'];


}
