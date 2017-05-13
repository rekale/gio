<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Repositories\TravelDocumentRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Response;

class TravelVerifyController extends AppBaseController
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
        return view('admin.travel_documents.verify');
    }

    /**
     * Store a newly created TravelDocument in storage.
     *
     * @param CreateTravelDocumentRequest $request
     *
     * @return Response
     */
    public function verify(Request $request)
    {
        $input = $request->all();


        $travel = $this->travelDocumentRepository->findWhere(['card_id' => $input['card_id']])->first();

        if(! isset($travel)) {
            Flash::error('card is not registered.');
            return redirect()->back();
        }

        $travel->card_id = null;
        $travel->unloading_at = Carbon::now();

        $travel->save();

        Flash::success('Travel Document has verified.');

        return redirect(route('admin.travel.verify'));
    }

}
