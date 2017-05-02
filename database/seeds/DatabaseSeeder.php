<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    protected $tables = [
        'users',
        'destinations',
    ];


    protected $seeds = [
        DestinationSeeder::class,
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        foreach ($this->seeds as $seed) {
            $this->call($seed);
        }


    }
}
