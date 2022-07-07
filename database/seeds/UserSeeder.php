<?php

namespace Database\Seeders;

use App\User;
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
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin123')
        ]);

        $admin->assignRole('admin');

        $pelanggan = User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' =>  Hash::make('pelanggan123')
        ]);

        $pelanggan->assignRole('pelanggan');
    }
}
