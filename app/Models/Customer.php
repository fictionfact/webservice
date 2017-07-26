<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Customer extends Model {

	use CrudTrait;

    /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'customers';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['birthday','gender','email','phone','credit','order','user_id'];
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

	public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function orderss()
    {
        return $this->hasMany('App\Models\Ordereditem');
    }
     
    // public function orderItems()
    // {
    //     return $this->hasMany('App\Models\Order');
    // }
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