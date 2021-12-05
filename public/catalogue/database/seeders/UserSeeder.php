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
        $n = 5;
        $users = [];
        
        for ($i = 1; $i <= $n; $i++)
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
            User::create([
                'pseudo' => $input['pseudo'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'code_role' => '0'
            ]);
        }


        //admin
        User::create([
            'pseudo' => 'Root1',
            'email' => 'Root1@gmail.com',
            'password' => Hash::make('PasswordRoot1'),
            'code_role' => '1'
        ]);

        //blocked user
        User::create([
            'pseudo' => 'User'. ($n+1),
            'email' => 'User'. ($n+1) .'@gmail.com',
            'password' => Hash::make('Password'. ($n+1)),
            'code_role' => '2'
        ]);
    }
}
