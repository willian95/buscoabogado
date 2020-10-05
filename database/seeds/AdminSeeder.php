<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(User::count() == 0){

            $user = new User;
            $user->name = "Admin";
            $user->email  = "admin@gmail.com";
            $user->password = bcrypt("12345678");
            $user->save();

        }

    }
}
