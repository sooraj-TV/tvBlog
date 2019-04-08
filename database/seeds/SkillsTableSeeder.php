<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        //Seed skills table        
        $skills = ['ColdFusion','Node JS','Javascript', 'PHP', 'MySQL', 'PostgreSQL', 'Bootstrap', 'CSS3', 'HTML/XHTML', 'HTML', 'SQL Server', 'Mongo DB', 'AWS', 'Azure', 'Android', 'iOS', 'React JS', 'React Native'];
        foreach($skills as $skill){
            DB::table('skill_matrices')->insert(
                ['skills' => $skill]            
            );
        }
    }
}
