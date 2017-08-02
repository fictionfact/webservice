<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {


	//use CrudTrait;
/**
*
*   @SWG\Definition(
*       definition="item",
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
*           property="price",
*           type="integer"
*       ),
*       @SWG\Property(
*           property="stock",
*           type="string"
*       ),
*       @SWG\Property(
*           property="description",
*           type="string"
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


	protected $table = 'items';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['name','price','stock','description', 'image', 'shop_id'];
	public $timestamps = true;



	public function itags()
    {
        return $this->belongsToMany('App\Models\Itag','item_itags');
    }

    public function shops()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function ordered_item()
    {
        return $this->hasOne('App\Models\OrderedItem');
    }


}