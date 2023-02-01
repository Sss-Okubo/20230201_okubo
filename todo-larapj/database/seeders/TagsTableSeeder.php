<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param =[
            'tag_name' => '家事'
        ];
        DB::table('tags')->insert($param);

        //
        $param =[
            'tag_name' => '勉強'
        ];
        DB::table('tags')->insert($param);
       //
        
       $param =[
            'tag_name' => '運動'
        ];
        DB::table('tags')->insert($param);

       $param =[
            'tag_name' => '食事'
        ];
        DB::table('tags')->insert($param);
        
        $param =[
            'tag_name' => '移動'
        ];
        DB::table('tags')->insert($param);

    }
}
