<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stag extends Model {

/**
*
*	@SWG\Definition(
*		definition="stag",
*		@SWG\Property(
*			property="id",
*			type="integer",
*			format="int32"
*		),
*		@SWG\Property(
*			property="name",
*			type="string"
*		),
*		@SWG\Property(
*			property="created_at",
*			type="string"
*		),
*		@SWG\Property(
*			property="updated_at",
*			type="string"
*		)
*	)
*/

	protected $table = 'stags';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['name'];
	public $timestamps = true;



	public function shops()
	{
		return $this->belongsToMany('App\Models\Shop','shop_stags');
	}


}