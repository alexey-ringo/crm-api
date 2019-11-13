<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Helpers\CollectionHelper;

class DashboardController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $results = Review::all()->sortByDesc('created_at');
        $total = $results->count();
        $pageSize = 25;
        $reviews = CollectionHelper::paginate($results, $total, $pageSize);
        
        return view('dashboard', compact('reviews'));
    }
}
