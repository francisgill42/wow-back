<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Level::class);
        $this->call(SubjectSeeder::class);
        // 	$user = \App\User::create([
        // 	'name' => 'master',
        // 	'email' => 'master@erp.com',
        // 	'password' => bcrypt('secret'),
        // ]);
    }
}
