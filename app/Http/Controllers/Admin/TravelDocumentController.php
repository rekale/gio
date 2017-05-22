<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\DoesntHaveCriteria;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateTravelDocumentRequest;
use App\Http\Requests\UpdateTravelDocumentRequest;
use App\Repositories\CargoLetterRepository;
use App\Repositories\TravelDocumentRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TravelDocumentController extends AppBaseController
{
    /** @var  TravelDocumentRepository */
    private $travelDocumentRepository;

    public function __construct(TravelDocumentRepository $travelDocumentRepo)
    {
        $this->travelDocumentRepository = $travelDocumentRepo;
    }

    /**
     * Display a listing of the TravelDocument.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->travelDocumentRepository->pushCriteria(new RequestCriteria($request));
        $travelDocuments = $this->travelDocumentRepository->paginate(15);

        return view('admin.travel_documents.index')
            ->with('travelDocuments', $travelDocuments);
    }

    /**
     * Show the form for creating a new TravelDocument.
     *
     * @return Response
     */
    public function create(CargoLetterRepository $cargoRepo)
    {
        $cargoes = $cargoRepo->pushCriteria(new DoesntHaveCriteria('travelDocument'))
                             ->pluck('id', 'id');

        return view('admin.travel_documents.create', compact('cargoes'));
    }

    /**
     * Store a newly created TravelDocument in storage.
     *
     * @param CreateTravelDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateTravelDocumentRequest $request)
    {
        $input = $request->all();

        $travelDocument = $this->travelDocumentRepository->create($input);

        Flash::success('Travel Document saved successfully.');

        return redirect(route('admin.travelDocuments.index'));
    }

    /**
     * Display the specified TravelDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $travelDocument = $this->travelDocumentRepository->findWithoutFail($id);

        if (empty($travelDocument)) {
            Flash::error('Travel Document not found');

            return redirect(route('admin.travelDocuments.index'));
        }

        return view('admin.travel_documents.show')->with('travelDocument', $travelDocument);
    }

    /**
     * Show the form for editing the specified TravelDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, CargoLetterRepository $cargoRepo)
    {
        $travelDocument = $this->travelDocumentRepository->findWithoutFail($id);
        $cargoes = $cargoRepo->pluck('id', 'id');

        if (empty($travelDocument)) {
            Flash::error('Travel Document not found');

            return redirect(route('admin.travelDocuments.index'));
        }

        return view('admin.travel_documents.edit', compact('travelDocument', 'cargoes'));
    }

    /**
     * Update the specified TravelDocument in storage.
     *
     * @param  int              $id
     * @param UpdateTravelDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTravelDocumentRequest $request)
    {
        $travelDocument = $this->travelDocumentRepository->findWithoutFail($id);

        if (empty($travelDocument)) {
            Flash::error('Travel Document not found');

            return redirect(route('admin.travelDocuments.index'));
        }

        $travelDocument = $this->travelDocumentRepository->update($request->all(), $id);

        Flash::success('Travel Document updated successfully.');

        return redirect(route('admin.travelDocuments.index'));
    }

    /**
     * Remove the specified TravelDocument from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $travelDocument = $this->travelDocumentRepository->findWithoutFail($id);

        if (empty($travelDocument)) {
            Flash::danger('Travel Document not found');

            return redirect(route('admin.travelDocuments.index'));
        }

        $this->travelDocumentRepository->delete($id);

        Flash::success('Travel Document deleted successfully.');

        return redirect(route('admin.travelDocuments.index'));
    }

}
