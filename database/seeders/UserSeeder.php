<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Administrator',
                'email' => 'admin@topupin.com',
                'password' => Hash::make('admin'),
                'role_id' => 1,
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@topupin.com',
                'password' => Hash::make('staff'),
                'role_id' => 2,
            ],
        ];

        foreach($data as $row){
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
                'role_id' => $row['role_id'],
            ]);
        }
    }
}
