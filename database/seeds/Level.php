<?php

use Illuminate\Database\Seeder;

class Level extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'Montessori',
            'Nursery',
            'KG 1',
            'KG 2',
            'Class 1',
            'Class 2',
            'Class 3',
            'Class 4',
            'Class 5',
            'Class 6',
            'Class 7',
            'Class 8',
            'Class 9',
            'Class 10',
        ];

        foreach($arr as $a){
            App\Level::create(['level' => $a]);
        }
        return 500;

    }
}
