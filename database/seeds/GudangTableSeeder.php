<?php

use Illuminate\Database\Seeder;

class GudangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Gudang = \App\Model\Warehouse::create([
            'name' => 'Gudang Pusat',
            'address' => 'bandung Barat',
            'contact' => '085600267104',
            'email' => 'pusat@gmail.com',
            'category' => 'koperasi',
            'area' => '17',
            'email' => 'pusat@gmail.com',
        ]);
    }
}
