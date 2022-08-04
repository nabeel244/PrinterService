<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'mobile' => 12345678,
            'user_type' => 'admin',
            'mobile_code' => +92,
            'password' => bcrypt('123456'),
            'status' => 'approved'
        ]);
        $user->assignRole('admin');
    }
}
