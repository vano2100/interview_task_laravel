<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class startData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article')->insert([
                'id' => '1',
                'name' => 'printer',
                'published' => '1',
                'deleted' => '0'
            ]);
    }
}
