<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itag extends Model {

/**
*
*	@SWG\Definition(
*		definition="itag",
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

	protected $table = 'itags';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['name'];
	public $timestamps = true;


	public function items()
    {
        return $this->belongsToMany('App\Models\Item','item_itags');
    }


}