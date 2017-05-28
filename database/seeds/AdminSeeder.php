<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123123'),
        ]);

        factory(Admin::class, 10)->create();
    }
}
