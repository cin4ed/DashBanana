<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/users.json');
        $users = json_decode($json);

        foreach ($users as $key => $value) {
            User::create([
                'name' => $value->name,
                'email' => $value->email,
                'role' => $value->role,
                'password' => Hash::make($value->password),
            ]);
        }
    }
}
