<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCargoLetterRequest;
use App\Http\Requests\UpdateCargoLetterRequest;
use App\Repositories\CargoLetterRepository;
use App\Repositories\CustomerRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CargoLetterController extends AppBaseController
{
    /** @var  CargoLetterRepository */
    private $cargoLetterRepository;

    public function __construct(CargoLetterRepository $cargoLetterRepo)
    {
        $this->cargoLetterRepository = $cargoLetterRepo;
    }

    /**
     * Display a listing of the CargoLetter.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cargoLetterRepository->with('customer', 'user')
                                    ->pushCriteria(new RequestCriteria($request));

        $cargoLetters = $this->cargoLetterRepository->paginate(15);

        return view('admin.cargo_letters.index')
            ->with('cargoLetters', $cargoLetters);
    }

    /**
     * Show the form for creating a new CargoLetter.
     *
     * @return Response
     */
    public function create(CustomerRepository $customerRepo)
    {
        $customers = $customerRepo->all();

        return view('admin.cargo_letters.create', compact('customers'));
    }

    /**
     * Store a newly created CargoLetter in storage.
     *
     * @param CreateCargoLetterRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoLetterRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;

        $cargoLetter = $this->cargoLetterRepository->create($input);

        Flash::success('Cargo Letter saved successfully.');

        return redirect(route('admin.cargoLetters.index'));
    }

    /**
     * Display the specified CargoLetter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cargoLetter = $this->cargoLetterRepository->findWithoutFail($id);

        if (empty($cargoLetter)) {
            Flash::error('Cargo Letter not found');

            return redirect(route('admin.cargoLetters.index'));
        }

        return view('admin.cargo_letters.show')->with('cargoLetter', $cargoLetter);
    }

    /**
     * Show the form for editing the specified CargoLetter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, CustomerRepository $customerRepo)
    {
        $cargoLetter = $this->cargoLetterRepository->findWithoutFail($id);

        if (empty($cargoLetter)) {
            Flash::error('Cargo Letter not found');

            return redirect(route('admin.cargoLetters.index'));
        }

        $customers = $customerRepo->all();

        return view('admin.cargo_letters.edit', compact('cargoLetter', 'customers'));
    }

    /**
     * Update the specified CargoLetter in storage.
     *
     * @param  int              $id
     * @param UpdateCargoLetterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoLetterRequest $request)
    {
        $cargoLetter = $this->cargoLetterRepository->findWithoutFail($id);

        if (empty($cargoLetter)) {
            Flash::error('Cargo Letter not found');

            return redirect(route('admin.cargoLetters.index'));
        }

        $cargoLetter = $this->cargoLetterRepository->update($request->all(), $id);

        Flash::success('Cargo Letter updated successfully.');

        return redirect(route('admin.cargoLetters.index'));
    }

    /**
     * Remove the specified CargoLetter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cargoLetter = $this->cargoLetterRepository->findWithoutFail($id);

        if (empty($cargoLetter)) {
            Flash::error('Cargo Letter not found');

            return redirect(route('admin.cargoLetters.index'));
        }

        $this->cargoLetterRepository->delete($id);

        Flash::success('Cargo Letter deleted successfully.');

        return redirect(route('admin.cargoLetters.index'));
    }
}
