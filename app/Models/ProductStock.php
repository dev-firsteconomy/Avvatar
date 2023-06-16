<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductStock extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    // protected $fillable=['product_id','size_id','color_id','stock_qty'];   

    public function singleProduct(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function productSize(){
        return $this->belongsTo('App\Models\Size','size_id');
    }

    public function productColor(){
        return $this->belongsTo('App\Models\Color','color_id');
    }
}
