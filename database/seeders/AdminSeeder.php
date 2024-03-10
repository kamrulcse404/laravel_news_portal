<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected static ?string $password;


    public function run(): void
    {
        $admin = new Admin();

        $admin->image = '/test';
        $admin->name = 'Super Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = static::$password ??= Hash::make('password');
        $admin->status = 1;

        $admin->save();
    }
}
