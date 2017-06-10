<?php

use Illuminate\Database\Seeder;

class SeederTablePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        $permissions = array(
        	array('id'=>1, 'name'=>'Add Shop'),
        	array('id'=>2, 'name'=>'Edit Shop'),
        	array('id'=>3, 'name'=>'Delete Shop'),
        	array('id'=>4, 'name'=>'Add Shop Tag'),
        	array('id'=>5, 'name'=>'Edit Shop Tag'),
        	array('id'=>6, 'name'=>'Delete Shop Tag'),
            array('id'=>7, 'name'=>'Add Item'),
            array('id'=>8, 'name'=>'Edit Item'),
            array('id'=>9, 'name'=>'Delete Item'),
            array('id'=>10, 'name'=>'Add Item Tag'),
            array('id'=>11, 'name'=>'Edit Item Tag'),
            array('id'=>12, 'name'=>'Delete Item Tag'),
            array('id'=>13, 'name'=>'Add Ordered Item'),
            array('id'=>14, 'name'=>'Edit Ordered Item'),
            array('id'=>15, 'name'=>'Delete Ordered Item'),
            array('id'=>16, 'name'=>'Add Shop Owner'),
            array('id'=>17, 'name'=>'Edit Shop Owner'),
            array('id'=>18, 'name'=>'Delete Shop Owner'),
            array('id'=>19, 'name'=>'Add Shop Location'),
            array('id'=>20, 'name'=>'Edit Shop Location'),
            array('id'=>21, 'name'=>'Delete Shop Location'),
            array('id'=>22, 'name'=>'Add Order'),
            array('id'=>23, 'name'=>'Edit Order'),
            array('id'=>24, 'name'=>'Delete Order'),
            array('id'=>25, 'name'=>'Add Customer'),
            array('id'=>26, 'name'=>'Edit Customer'),
            array('id'=>27, 'name'=>'Delete Customer'),
            array('id'=>28, 'name'=>'View Shop'),
            array('id'=>29, 'name'=>'View Shop Tag'),
            array('id'=>30, 'name'=>'View Item'),
            array('id'=>31, 'name'=>'View Item Tag'),
            array('id'=>32, 'name'=>'View Ordered Item'),
            array('id'=>33, 'name'=>'View Shop Owner'),
            array('id'=>34, 'name'=>'View Shop Location'),
            array('id'=>35, 'name'=>'View Order'),
            array('id'=>36, 'name'=>'View Customer'),
            array('id'=>37, 'name'=>'View All Order'),
            array('id'=>38, 'name'=>'View All Ordered Item'),
            
            );

        DB::table('permissions')->insert($permissions);


        DB::table('roles')->delete();
        $roles = array(
            array('id'=>1, 'name'=>'Master'),
            array('id'=>2, 'name'=>'Admin'),
            array('id'=>3, 'name'=>'Shop Owner'),

            );
        DB::table('roles')->insert($roles);


        DB::table('permission_roles')->delete();
        $permissionroles = array(
            array('permission_id'=>1, 'role_id'=>1),
            array('permission_id'=>2, 'role_id'=>1),
            array('permission_id'=>3, 'role_id'=>1),
            array('permission_id'=>4, 'role_id'=>1),
            array('permission_id'=>5, 'role_id'=>1),
            array('permission_id'=>6, 'role_id'=>1),
            array('permission_id'=>7, 'role_id'=>1),
            array('permission_id'=>8, 'role_id'=>1),
            array('permission_id'=>9, 'role_id'=>1),
            array('permission_id'=>10, 'role_id'=>1),
            array('permission_id'=>11, 'role_id'=>1),
            array('permission_id'=>12, 'role_id'=>1),
            array('permission_id'=>13, 'role_id'=>1),
            array('permission_id'=>14, 'role_id'=>1),
            array('permission_id'=>15, 'role_id'=>1),
            array('permission_id'=>16, 'role_id'=>1),
            array('permission_id'=>17, 'role_id'=>1),
            array('permission_id'=>18, 'role_id'=>1),
            array('permission_id'=>19, 'role_id'=>1),
            array('permission_id'=>20, 'role_id'=>1),
            array('permission_id'=>21, 'role_id'=>1),
            array('permission_id'=>22, 'role_id'=>1),
            array('permission_id'=>23, 'role_id'=>1),
            array('permission_id'=>24, 'role_id'=>1),
            array('permission_id'=>25, 'role_id'=>1),
            array('permission_id'=>26, 'role_id'=>1),
            array('permission_id'=>27, 'role_id'=>1),
            array('permission_id'=>28, 'role_id'=>1),
            array('permission_id'=>29, 'role_id'=>1),
            array('permission_id'=>30, 'role_id'=>1),
            array('permission_id'=>31, 'role_id'=>1),
            array('permission_id'=>32, 'role_id'=>1),
            array('permission_id'=>33, 'role_id'=>1),
            array('permission_id'=>34, 'role_id'=>1),
            array('permission_id'=>35, 'role_id'=>1),
            array('permission_id'=>36, 'role_id'=>1),
            array('permission_id'=>37, 'role_id'=>1),
            array('permission_id'=>38, 'role_id'=>1),
            

            array('permission_id'=>32, 'role_id'=>3),
            array('permission_id'=>35, 'role_id'=>3),

            );

        DB::table('permission_roles')->insert($permissionroles);




        DB::table('role_users')->delete();
        $roleusers = array(
            array('role_id'=>1, 'user_id'=>1),
            array('role_id'=>3, 'user_id'=>2),
        	array('role_id'=>3, 'user_id'=>4),
        	);

        DB::table('role_users')->insert($roleusers);
    }
}
