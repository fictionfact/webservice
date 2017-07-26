<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Shop extends Model {

	use CrudTrait;

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'shops';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['name', 'image', 'is_open', 'open_at', 'close_at', 'shop_location_id', 'shop_owner_id'];
	public $timestamps = true;

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    public function getShopOwnerName(){
        return $this->shop_owner->user->name;
    }

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	
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

    // public function order(){
    //     return $this->hasManyThrough('App\Models\Order', 'App\Models\ShopOwner');
    // }

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function ordered_items()
    {
        return $this->hasMany('App\Models\OrderedItem');
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

	public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "local";
        $destination_path = "uploads/images/shops";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }

    public static function boot()
    {
        static::deleting(function($obj) {
            \Storage::disk('local')->delete($obj->image);
        });
    }
}