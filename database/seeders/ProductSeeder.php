<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $products = Product::factory(70)->create();
        foreach ($products as $product) {
            $product->tags()->attach(
                [
                    Tag::all()->random()->id,
                    Tag::all()->random()->id,
                    Tag::all()->random()->id
                ]
            );

            $image=new Image();
            $image->name='https://cdn.wallapop.com/images/10420/cw/e3/__/c10420p780000015/i2614704398.jpg?pictureSize=W640';
            $image->product_id=$product->id;
            $image->save();

            $image2=new Image();
            $image2->name='https://d2r9epyceweg5n.cloudfront.net/stores/001/258/687/products/img_20220822_102447_995-33f048064e9d427b9b16611756380189-1024-1024.jpg';
            $image2->product_id=$product->id;
            $image2->save();

            $image3=new Image();
            $image3->name='https://previews.123rf.com/images/keladawy/keladawy1612/keladawy161200043/69461949-vista-frontal-de-la-jarra-de-cer%C3%A1mica-artesanal-colorida-decorada-de-estilo-nubio-sobre-fondo.jpg';
            $image3->product_id=$product->id;
            $image3->save();

        }
    }
}
