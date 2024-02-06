<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        User::insert([

            [
                'name'=>'Admin',
                'username'=>'Admin',
                'email'=>'admin@example.com',
                'password'=>Hash::make('admin123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Vendor',
                'username'=>'Vendor',
                'email'=>'vendor@example.com',
                'password'=>Hash::make('vendor'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'username' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('user'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $admin=User::where('name', 'Admin')->first();
        $admin->assignRole('admin');

        $vendor=User::where('name', 'Vendor')->first();
        $vendor->assignRole('vendor');

        $user=User::where('name', 'User')->first();
        $user->assignRole('user');
    }
}
