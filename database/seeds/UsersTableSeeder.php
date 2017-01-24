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
        $data = [
            [
                'name' => 'admin',
            	'email'=>'adminipon@uny.ac.id',
            	'password'=>Hash::make('admin') 
            ],
        ];
        DB::table('users')->insert($data);
    }
}
