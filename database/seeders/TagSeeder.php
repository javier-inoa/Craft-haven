<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recycling = new Tag();
        $recycling->name = 'Reciclado';
        $recycling->description = 'Esta etiqueta esta hecha para todos los productos reciclados ';
        $recycling->save();

        $handmade = new Tag();
        $handmade->name = 'Hecho a Mano';
        $handmade->save();

        Tag::factory(18)->create();
    }
}
