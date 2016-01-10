<?php

use Illuminate\Database\Seeder;
use Pingpong\Admin\Entities\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = array(
        	array(
        		'key' => 'contact.email',
        		'value' => 'email@example.com',
        	),
        	array(
        		'key' => 'contact.phone',
        		'value' => '+123456789',
        	),        	
        );

        foreach ($options as $option) {
            Option::create($option);
        }        
    }
}
