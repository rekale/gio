<?php

namespace App\Repositories;

use App\Models\CargoLetter;
use Carbon\Carbon;
use InfyOm\Generator\Common\BaseRepository;

class CargoLetterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'license_plate',
        'customer_id',
        'admin_id'
    ];

    const MONTH = [
        1 => 'AB',
        2 => 'CD',
        3 => 'EF',
        4 => 'GH',
        5 => 'IJ',
        6 => 'KL',
        7 => 'MN',
        8 => 'OP',
        9 => 'QR',
        10 => 'ST',
        11 => 'UV',
        12 => 'WX',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CargoLetter::class;
    }

     /**
     * Save a new entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['id'] = $this->createId($attributes['customer_id']);
        return parent::create($attributes);
    }

    public function attachProducts(CargoLetter $cargoLetter, $input)
    {
        $dataProducts = $this->createProduct($input);

        $cargoLetter->products()->attach($dataProducts);
    }

    public function syncProducts(CargoLetter $cargoLetter, $input)
    {
        $dataProducts = $this->createProduct($input);

        $cargoLetter->products()->sync($dataProducts);
    }

    private function createProduct($input)
    {
        $dataProducts = [];

        for($i=0; $i < count($input['product_id']); $i++) {
            if(isset($input['product_id'][$i])) {
                $dataProducts[$input['product_id'][$i]] = [
                    'quantity' => isset($input['quantity'][$i]) ? $input['quantity'][$i] :0,
                    'note' => isset($input['note'][$i]) ? $input['note'][$i] : null,
                ];
            }
        }

        return $dataProducts;
    }

    public function createId($customerId)
    {
        $today = Carbon::now();
        $yearMonth = $today->format('y') . self::MONTH[$today->month];

        $session  = session();

        $unique = $customerId . '-' . $yearMonth;

        $id = $session->exists($unique) ? $session->get($unique) + 1 : 1;
        $session->put($unique, $id);

        return $unique . '-' . str_pad($id, 5, 0, STR_PAD_LEFT);
    }
}
