<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed designation table        
        $designation = ['Senior Software Engineer','Software Engineer','Team Lead'];
        foreach($designation as $des){
            DB::table('designations')->insert(
                ['designation' => $des]            
            );
        }
       
    }
}
