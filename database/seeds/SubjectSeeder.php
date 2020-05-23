<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'English',
            'Urdu',
            'Math'
        ];
        for ($i=1; $i <= 14 ; $i++) {

        foreach($arr as $a){
 
                App\Subject::create(['subject' => $a,'level_id' => $i]);
            }

        }
        return 500;


    }
}
