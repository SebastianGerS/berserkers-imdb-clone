<?php

namespace App\Http\Controllers;

use App\Review;
use App\Title;
use App\Movie;
use App\Series;
use Illuminate\Http\Request;
use Auth;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $title = Title::find($id);
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        if($title->type != 'movie' && $title->type != 'series'){
            return back();
        }
        return view('reviews.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()) {
            $review = Review::create([
                'title_id' => $request->input('title_id'),
                'user_id' => $request->user()->id,
                'title' => $request->input('title'),
                'body' => $request->input('body')
            ]);
            
            if($review) {
                return back()->withInput()->with('success', 'Review created successfully');
            } else {
                return back()->withInput()->with('error', 'Error creating review');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
