<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function getHome() {
    $user = auth()->user();
    $posts = $user->posts()->with('category')->get();
    $postsCount = $posts->count();
    $categoriesCount = $user->categories()->count();
    $latestPosts = $user->posts()->orderBy('created_at', 'desc')->take(3)->get();
    $popularCategories = $user->categories()
        ->withCount('posts')
        ->orderBy('posts_count', 'desc')
        ->take(5)
        ->get();

    return view('home', compact('postsCount', 'categoriesCount', 'latestPosts', 'popularCategories')); }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
