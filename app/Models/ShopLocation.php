<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ShopLocation extends Model {

	//use CrudTrait;

/**
*
*   @SWG\Definition(
*       definition="shop_location",
*       @SWG\Property(
*           property="id",
*           type="integer",
*           format="int32"
*       ),
*       @SWG\Property(
*           property="name",
*           type="string"
*		),
*       @SWG\Property(
*           property="created_at",
*           type="string"
*       ),
*       @SWG\Property(
*           property="updated_at",
*           type="string"
*       ),
*		@SWG\Property(
*           property="deleted_at",
*           type="string"
*       )
*   )
*/

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'shop_locations';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['name'];
	public $timestamps = true;

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function shops()
	{
		return $this->hasMany('App\Models\Shop');
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