<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Role::create([
            'guard_name' => 'web',
            'name' => 'Admin'
        ]);
        Role::create([
            'guard_name' => 'web',
            'name' => 'Pembimbing'
        ]);
     $pembimbing = User::create([
        'username' => 'nuzul',
        'name' => 'Nuzul',
        'password' => bcrypt('12345678')
     ]);

     $pembimbing->assignRole('Pembimbing');
     $pembimbing->assignRole('Admin');
    }
}
