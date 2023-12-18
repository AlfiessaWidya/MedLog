<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username'=>'admin',
                'level'=>'admin',
                'password'=>Hash::make('000000')
            ],
            
            [
                'username'=>'user1',
                'level'=>'user',
                'password'=>Hash::make('123456')
            ],
            [
                'username'=>'user2',
                'level'=>'user',
                'password'=>Hash::make('111111')
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
