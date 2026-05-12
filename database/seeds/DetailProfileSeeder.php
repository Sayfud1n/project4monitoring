<?php

use Illuminate\Database\Seeder;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_profile')->insert([
            'address' => 'jember',
            'nomor telfon' => '089515825393',
            'ttl' => '2006-02-02',
            'foto' => 'picture.png'
        ]);
    }
}
