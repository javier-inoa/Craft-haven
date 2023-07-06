<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wood = new Category();
        $wood->name = 'Madera';
        $wood->description = 'Aqui se mostraran todos los productos que sean de madera o tallados con ella.';
        $wood->save();

        $leather = new Category();
        $leather->name = 'Cuero';
        $leather->save();

        Category::factory(9)->create();
    }
}
