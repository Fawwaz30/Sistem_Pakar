<?php

namespace Database\Seeders;

use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
        ]);

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => Role::where(['name' => 'Admin'])->first()->id,
        ]);

        Profil::create([
            'profil' => '<p>Aplikasi Tentang </p>',
            'foto' => 'public/files/logo-awal.png',
        ]);
    }
}
