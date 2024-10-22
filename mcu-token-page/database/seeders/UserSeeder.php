<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->hasReferral()->create([
            'name'=>'test',
            'email'=>'test@gmail.com',
            'password'=>'root'
        ]);

        User::factory()->hasReferral()->create([
            'name'=>'store',
            'email'=>'store@gmail.com',
            'password'=>'root',
            'tokens' => '1000'
        ]);

        User::factory(10)->hasReferral()->create();
    }
}
