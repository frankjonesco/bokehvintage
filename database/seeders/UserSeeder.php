<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'hex' => 'K78fBpxQyDF',
                'username' => 'camdenmoo',
                'email' => 'frankjones.web@gmail.com', 
                'password' => '$2y$10$VUka4YKQqXn.L0qWO34U.uM9avU9CmiWEjSQL.P6ZFFHuLLrvN3Di',
                'first_name' => 'Frank',
                'last_name' => 'Jones',
                'active' => 1

            ]            
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
