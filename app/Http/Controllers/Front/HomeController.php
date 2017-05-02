<?php

namespace App\Http\Controllers\Front;

use App\Criteria\LatestCriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home', compact('destinations'));
    }

}
