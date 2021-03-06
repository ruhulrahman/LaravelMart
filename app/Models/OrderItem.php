<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class OrderItem extends Model {

    protected $table = "orderitems";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public static $rules = [
	    "order_id" => "required",
	    "product_id" => "required",
	    "quantity" => "required",
	    "price" => "required",

	];


    public function product() {
        return $this->belongsTo("Product");
    }

    public function order() {
        return $this->belongsTo("Order");
    }

    public function getTotalAttribute() {
        return $this->quantity * $this->price;
    }

}
