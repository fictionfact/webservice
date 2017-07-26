<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Order extends Model {

	use CrudTrait;
	use \Backpack\CRUD\CrudTrait, \Venturecraft\Revisionable\RevisionableTrait;

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'orders';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['customer_id','order_batch_code','order_status','total_price','reserve_time','shop_id'];
	public $timestamps = true;

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	public function getShopOwnerName(){
        return $this->shop->shop_owner->user->name;
    }

    public function getCustomerName(){
        return $this->customer->user->name;
    }
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

	public function ordered_items()
    {
        return $this->hasMany('App\Models\OrderedItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }


    public function shop_owner()
    {
        return $this->belongsTo('App\Models\ShopOwner');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}