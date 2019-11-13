<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Auth;

class ReviewController extends Controller
{
    protected $user;
    
    public function __construct()
    {
       $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $review = new Review([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'user_id' => $this->user->id
        ]);
        
        $this->user->reviews()->save($review);
        
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $comments = Comment::where('review_id', $review->id)->orderByDesc('created_at')->get();
        
        return view('review.edit', [
            'review'  => $review,
            'comments' => $comments,
            'user' => $this->user
            ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->only(['title', 'text']));
        
        return redirect()->route('dashboard');
    }
    
}
