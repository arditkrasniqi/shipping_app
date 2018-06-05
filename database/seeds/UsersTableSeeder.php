<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'roleId'=>1,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'personalNumber'=>'123456',
            'password'=>'$2y$12$xOjwHbwfu3JViHOMnOhGUeygwXXSvW6yrK1RgGtak1aBbk6Qm6UYm', // 123456
            'remember_token'=>'',
            'created_at'=>date("Y-m-d"),
            'updated_at'=>date("Y-m-d")
        ];

        DB::table('users')->insert($admin);
    }
}
