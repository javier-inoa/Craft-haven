<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=new User();
        $admin->name='Administrador';
        $admin->email='admin@admin.com';
        $admin->password='12345678';
        $admin->type='administrator';
        $admin->save();

        $creator=new User();
        $creator->name='Creador';
        $creator->email='creator@creator.com';
        $creator->password='12345678';
        $creator->type='seller';
        $creator->save();

        $visitor=new User();
        $visitor->name='Visitante';
        $visitor->email='visitor@visitor.com';
        $visitor->password='12345678';
        $visitor->save();

        User::factory(47)->create();
    }
}
