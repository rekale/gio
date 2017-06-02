<?php

namespace App\Http\Controllers\Front;

use App\Criteria\CategoryCriteria;
use App\Criteria\LatestCriteria;
use App\Criteria\LimitCriteria;
use App\Criteria\RandomCriteria;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $productRepo;
    private $catRepo;

    public function __construct(ProductRepository $productRepo, CategoryRepository $catRepo)
    {
        $this->productRepo = $productRepo;
        $this->catRepo = $catRepo;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->productRepo->pushCriteria(LatestCriteria::class);

        $products = $this->productRepo->paginate();
        $categories = $this->catRepo->all();
        $productRandoms = $this->productRepo->pushCriteria(RandomCriteria::class)
                                    ->pushCriteria(new LimitCriteria(3))
                                    ->all();

        return view('front.home', compact('products', 'productRandoms', 'categories'));
    }

    public function products(Request $req)
    {
        $category = $req->input('category');

        $this->productRepo->pushCriteria(LatestCriteria::class)
                    ->pushCriteria(new CategoryCriteria($category));

        $products = $this->productRepo->paginate();
        $categories = $this->catRepo->all();

        return view('front.products', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = $this->productRepo->find($id);

        return view('front.show', compact('product'));
    }

}
