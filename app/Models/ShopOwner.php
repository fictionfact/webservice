<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ShopOwner extends Model {

	//use CrudTrait;

/**
*
*   @SWG\Definition(
*       definition="shop_owner",
*       @SWG\Property(
*           property="id",
*           type="integer",
*           format="int32"
*       ),
*       @SWG\Property(
*           property="user_id",
*           type="string"
*		),
*       @SWG\Property(
*           property="birthday",
*           type="string",
*			format="date"
*		),
*       @SWG\Property(
*           property="gender",
*           type="string"
*		),
*       @SWG\Property(
*           property="phone",
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

	protected $table = 'shop_owners';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['birthday', 'gender', 'phone', 'user_id'];
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

    /**
     * Get the comments for the blog post.
     */
    
    public function shops()
	{
		return $this->hasMany('App\Models\Shop');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
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