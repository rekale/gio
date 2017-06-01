<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TravelDocumentRepository;
use Illuminate\Http\Request;

class SalesInvoicesController extends Controller
{

    private $docRepo;

    public function __construct(TravelDocumentRepository $travelDocumentRepo)
    {
        $this->docRepo = $travelDocumentRepo;
    }

    public function show($id)
    {
        $doc = $this->docRepo->with(['cargoLetter.products'])->find($id);
        list($cargo, $products) = [$doc->cargoLetter, $doc->cargoLetter->products];

        return view('admin.sales_invoices.show', compact('doc', 'cargo', 'products'));
    }

}
