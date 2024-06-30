<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
 
class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['name' => 'gorg', 'is_admin' => true, 'password'=>'gormless']); 
    }
}

// 'name' => 'George'
//             'email' => 'georgekulaev@yandex.ru',
//             'email_verified_at' => now(),
//             'password' => "gormless",
//             'remember_token' => Str::random(10),