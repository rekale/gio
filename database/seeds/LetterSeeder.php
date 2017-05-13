<?php

use App\Models\CargoLetter;
use App\Models\Customer;
use App\Models\Product;
use App\Models\TravelDocument;
use App\Repositories\CargoLetterRepository;
use App\User;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();
        $users = User::all();
        $repo = app(CargoLetterRepository::class);
        $products = Product::all();

        $cargoLetters = factory(CargoLetter::class, 20)->make()->each(function ($cargo)  use ($customers, $users, $repo, $products) {
            $cargo->customer_id = $customers->random()->customer_id;
            $cargo->id = $repo->createId($cargo->customer_id);
            $cargo->user_id = $users->random()->id;

            $cargo->save();

            $input['product_id'] = $products->random(mt_rand(1, 5))->map->id->values();

            foreach ($input['product_id'] as $product) {
                $input['quantity'][] = mt_rand(1, 10);
            }

            $repo->attachProducts($cargo, $input);

            factory(TravelDocument::class)->create([
                'cargo_letter_id' => $cargo->id,
            ]);

        });
    }
}
