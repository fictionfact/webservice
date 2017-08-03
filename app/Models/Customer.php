<!-- <?php -->

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Customer extends Model {

	//use CrudTrait;
/**
*
*   @SWG\Definition(
*       definition="customer",
*       @SWG\Property(
*           property="id",
*           type="integer",
*           format="int32"
*       ),
*       @SWG\Property(
*           property="user_id",
*           type="integer"
*       ),
*       @SWG\Property(
*           property="birthday",
*           type="string",
*			format= "date"
*       ),
*       @SWG\Property(
*           property="gender",
*           type="string"
*       ),
*       @SWG\Property(
*           property="email",
*           type="string"
*       ),
*       @SWG\Property(
*           property="phone",
*           type="string"
*       ),
*       @SWG\Property(
*           property="credit",
*           type="integer"
*       ),
*       @SWG\Property(
*           property="order",
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