<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model {

/**
*
*   @SWG\Definition(
*       definition="shop",
*       @SWG\Property(
*           property="id",
*           type="integer",
*           format="int32"
*       ),
*       @SWG\Property(
*           property="name",
*           type="string"
*       ),
*       @SWG\Property(
*           property="is_open",
*           type="integer"
*       ),
*       @SWG\Property(
*           property="open_at",
*           type="string"
*       ),
*       @SWG\Property(
*           property="close_at",
*           type="string"
*       ),
*       @SWG\Property(
*           property="shop_location_id",
*           type="integer"
*       ),
*       @SWG\Property(
*           property="shop_owner_id",
*           type="integer"
*       ),
*       @SWG\Property(
*           property="created_at",
*           type="string"
*       ),
*       @SWG\Property(
*           property="updated_at",
*           type="string"
*       )
*   )
*/


	protected $table = 'shops';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['name', 'image', 'is_open', 'open_at', 'close_at', 'shop_location_id', 'shop_owner_id'];
	public $timestamps = true;


	
	public function stags()
    {
        return $this->belongsToMany('App\Models\Stag','shop_stags');
    }

    public function shop_owner()
    {
        // one shop owner may have more than 1 shop
        return $this->belongsTo('App\Models\ShopOwner');
    }


    public function shop_location()
    {
        // one shop location may have more than 1 shop
        return $this->belongsTo('App\Models\ShopLocation');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }


    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function ordered_items()
    {
        return $this->hasMany('App\Models\OrderedItem');
    }

}