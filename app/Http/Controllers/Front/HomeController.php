<?php

namespace App\Http\Controllers\Front;

use App\Criteria\LatestCriteria;
use App\Criteria\LimitCriteria;
use App\Criteria\RandomCriteria;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductRepository $productRepo)
    {
        $productRepo->pushCriteria(LatestCriteria::class);

        $products = $productRepo->paginate();
        $productRandoms = $productRepo->pushCriteria(RandomCriteria::class)
                                    ->pushCriteria(new LimitCriteria(3))
                                    ->all();

        return view('front.home', compact('products', 'productRandoms'));
    }

}
