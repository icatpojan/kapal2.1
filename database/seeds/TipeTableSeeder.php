<?php

use Illuminate\Database\Seeder;

class TipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Kategori = \App\Model\Category::insert([
            ['name' => 'VMS'],
            ['name' => 'CTV'],
            ['name' => 'Satelit Phone'],
            ['name' => 'Broad Band Marine'],
            ['name' => 'IoT']
        ]);

        $TipeProduk = \App\Model\Type::create([
            'name' => 'Smart One Solar',
            'category_id' => 1,
            'price' => 1000000
        ]);
        $TipeProduk = \App\Model\Type::create([
            'name' => 'Electronic Smart Eyes',
            'category_id' => 2,
            'price' => 2000000
        ]);
    }
}
