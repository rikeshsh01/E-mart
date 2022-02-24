<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'stock',
        'price',
        'offer_price',
        'size',
        'discount',
        'conditions',
        'status',
        'photo',
        'seller_id',
        'cat_id',
        'child_cat_id',
        'brand_id',

    ];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function related()
    {
        return $this->hasMany(Product::class,'cat_id','cat_id')->where(['status'=>'active']);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public static function getProductByCart($id)
    {
        return self::where('id',$id)->get()->toArray();
    }
  
}
