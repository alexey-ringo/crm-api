<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Auth;

class CommentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $review = Review::find($request->input('review_id'));
       
        $comment = new Comment([
            'text' => $request->input('text'),
            'review_id' => $review->id,
            'user_id' => $this->user->id
        ]);
        
        $this->user->comments()->save($comment);
        
        return redirect()->route('reviews.show', $review->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
       
        return view('comment.create', [
            'review'  => $review,
            'user' => $this->user
            ]);
    }
}
