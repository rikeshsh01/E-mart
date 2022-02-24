<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','product_id','order_number','sub_total', 'total_amount', 'quantity','delivery_charge','coupon','first_name','last_name','email','address','phone','country','sfirst_name','slast_name','semail','saddress','sphone','scountry','payment_method','payment_status','condition'];
}
