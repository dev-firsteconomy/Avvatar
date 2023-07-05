<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductProtein extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function proteinProduct()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function proteinName()
    {
        return $this->belongsTo('App\Models\Protein','protein_id');
    }
}
