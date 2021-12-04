<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\KeyValue;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 10;
        $users = [];
        
        for ($i = 1; $i <= $max; $i++)
        {
            $user = [
                'pseudo' => 'User'. $i,
                'email' => 'User'. $i .'@gmail.com',
                'password' =>'Password'. $i
            ];

            array_push($users,$user);
        };
       
        //normal users
        foreach($users as $input)
        {
            $role = KeyValue::getRole('0');

            User::create([
                'pseudo' => $input['pseudo'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'code_role' => $role['code']
            ]);
        }


        //admin
        $roleAdmin = KeyValue::getRole('1');

        User::create([
            'pseudo' => 'Root1',
            'email' => 'Root1@gmail.com',
            'password' => Hash::make('PasswordRoot1'),
            'code_role' => $roleAdmin['code']
        ]);
    }
}
