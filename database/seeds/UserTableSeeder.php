<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

            /* aqui se crean los roles  */

        $admin = new User;
        $admin->name = 'Yamile Ibarra Ceniceros';
        $admin->username = 'yamilic008';
        $admin->email = 'yamilic008@gmail.com';
        $admin->password = bcrypt('123') ;
        $admin->save();
    }
}
