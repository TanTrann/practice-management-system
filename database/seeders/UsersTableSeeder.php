<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::truncate();

        $UserRoles = Roles::where('name','User')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $User = Users::create([
			'User_name' => 'hieutan',
			'User_email' => 'hieutan@gmail.com',
			'User_phone' => '0932023991',
			'User_password' => md5('123456')	
        ]);
        $author = Users::create([
			'User_name' => 'hieutan123',
			'User_email' => 'hieutan123@gmail.com',
			'User_phone' => '0932023992',
			'User_password' => md5('123456')	
        ]);
        $user = Users::create([
			'User_name' => 'hieutan456',
			'User_email' => 'hieutan456@gmail.com',
			'User_phone' => '0932023993',
			'User_password' => md5('123456')
        ]);

        $User->roles()->attach($UserRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
