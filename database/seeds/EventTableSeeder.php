<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('event')->insert([

        	'preis' => 100,
	        'kurzbeschrieb' => 'TestFerien',
	        'tag1' => 'test1',
	        'tag2' => 'test2',
	        'tag3' => 'test3',y
	        'tag4' => 'test4',
	        'tag5' => 'test5',
	        'tag6' => 'test6',
	        'tag7' => 'test7',
	        'titel' => 'Besti Ferie wos je hets gits',
	        'dauer' => 3,
	        'status' => true,
	        'datum' => '20.02.1992',



        	]);
	    
    }
}
