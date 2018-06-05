<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role'=>'admin','created_at'=>date("Y-m-d"),'updated_at'=>date("Y-m-d")],
            ['role'=>'packager','created_at'=>date("Y-m-d"),'updated_at'=>date("Y-m-d")],
            ['role'=>'user','created_at'=>date("Y-m-d"),'updated_at'=>date("Y-m-d")]
        ];
        DB::table('roles')->insert($roles);
    }
}
