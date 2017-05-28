<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    protected $tables = [
        'admins',
        'categories',
        'customers',
        'products',
        'travel_documents',
        'cargo_letters',
    ];


    protected $seeds = [
        AdminSeeder::class,
        ProductSeeder::class,
        CustomerSeeder::class,
        LetterSeeder::class,
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

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        foreach ($this->seeds as $seed) {
            $this->call($seed);
        }


    }
}
