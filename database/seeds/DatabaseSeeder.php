<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use App\Models\Per_detail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionTableSeeder::class);
        $this->call(PerDetailTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
/**
 * 
 */
class UsersTableSeeder extends Seeder
{
	
	public function run(){
        $perAdmin = Permission::where('name_per','admin')->first();
        $userAdmin = User::create([
            'name'=>'Son',
            'email'=>'hongsonnguyen2712@gmail.com',
            'password'=>bcrypt('sonkaka1')
        ]);
        $userAdmin->permission()->attach($perAdmin);

        $perEdit = Permission::where('name_per','onlyEdit')->first();
        $userEdit = User::create([
            'name'=>'Tranh',
            'email'=>'tranhnt@gmail.com',
            'password'=>bcrypt('sonkaka1')
        ]);
        $userEdit->permission()->attach($userEdit);        

        $perCreate = Permission::where('name_per','onlyCreate')->first();
        $userCreate = User::create([
            'name'=>'Phu',
            'email'=>'phupham@gmail.com',
            'password'=>bcrypt('sonkaka1')
        ]);
        $userCreate->permission()->attach($perCreate); 

        $perDel = Permission::where('name_per','onlyDelete')->first();
		$userDel = User::create([
			'name'=>'Thien',
			'email'=>'thienpham@gmail.com',
			'password'=>bcrypt('sonkaka1')
		]);
        $userDel->permission()->attach($perDel);

        $perView = Permission::where('name_per','onlyView')->first();
        $userView = User::create([
            'name'=>'Tu',
            'email'=>'Tu123@gmail.com',
            'password'=>bcrypt('sonkaka1')
        ]);
        $userView->permission()->attach($perView);
	}
}
/**
 * 
 */
class PermissionTableSeeder extends Seeder
{
    
    function run() {
        Permission::create([
            'name_per'=>'admin'
        ]);
        Permission::create([
            'name_per'=>'onlyEdit'
        ]);
        Permission::create([
            'name_per'=>'onlyCreate'
        ]);
        Permission::create([
            'name_per'=>'onlyDelete'
        ]);
        Permission::create([
            'name_per'=>'onlyView'
        ]);
    }
}

/**
 * 
 */
class PerDetailTableSeeder extends Seeder
{
    function run() {
        $perAdmin = \App\Models\Permission::where('name_per','admin')->first();
        Per_detail::create([
            'id_per'=>1,
            'action_name'=>'Create item',
            'action_code'=>'Create',
            'check_action'=>1
        ]);
        Per_detail::create([
            'id_per'=>1,
            'action_name'=>'Edit item',
            'action_code'=>'Edit',
            'check_action'=>1
        ]);
        Per_detail::create([
            'id_per'=>1,
            'action_name'=>'Delete item',
            'action_code'=>'Delete',
            'check_action'=>1
        ]);
        Per_detail::create([
            'id_per'=>1,
            'action_name'=>'View item',
            'action_code'=>'View',
            'check_action'=>1
        ]);

        $perEdit = \App\Models\Permission::where('name_per','onlyEdit')->first();
        Per_detail::create([
            'id_per'=>2,
            'action_name'=>'Create item',
            'action_code'=>'Create',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>2,
            'action_name'=>'Edit item',
            'action_code'=>'Edit',
            'check_action'=>1
        ]);
        Per_detail::create([
            'id_per'=>2,
            'action_name'=>'Delete item',
            'action_code'=>'Delete',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>2,
            'action_name'=>'View item',
            'action_code'=>'View',
            'check_action'=>1
        ]);

        $perCreate = \App\Models\Permission::where('name_per','onlyCreate')->first();
        Per_detail::create([
            'id_per'=>3,
            'action_name'=>'Create item',
            'action_code'=>'Create',
            'check_action'=>1
        ]);
        Per_detail::create([
            'id_per'=>3,
            'action_name'=>'Edit item',
            'action_code'=>'Edit',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>3,
            'action_name'=>'Delete item',
            'action_code'=>'Delete',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>3,
            'action_name'=>'View item',
            'action_code'=>'View',
            'check_action'=>1
        ]);

        $perDelete = \App\Models\Permission::where('name_per','onlyDelete')->first();
        Per_detail::create([
            'id_per'=>4,
            'action_name'=>'Create item',
            'action_code'=>'Create',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>4,
            'action_name'=>'Edit item',
            'action_code'=>'Edit',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>4,
            'action_name'=>'Delete item',
            'action_code'=>'Delete',
            'check_action'=>1
        ]);
        Per_detail::create([
            'id_per'=>4,
            'action_name'=>'View item',
            'action_code'=>'View',
            'check_action'=>1
        ]);

        $perView = \App\Models\Permission::where('name_per','onlyView')->first();
        Per_detail::create([
            'id_per'=>5,
            'action_name'=>'Create item',
            'action_code'=>'Create',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>5,
            'action_name'=>'Edit item',
            'action_code'=>'Edit',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>5,
            'action_name'=>'Delete item',
            'action_code'=>'Delete',
            'check_action'=>0
        ]);
        Per_detail::create([
            'id_per'=>5,
            'action_name'=>'View item',
            'action_code'=>'View',
            'check_action'=>1
        ]);
    }
}
