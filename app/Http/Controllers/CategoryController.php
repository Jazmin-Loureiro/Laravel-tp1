<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = auth()->user()->categories()->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = auth()->user()->categories()->with('posts')->findOrFail($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = auth()->user()->categories()->findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,NULL,id,user_id,' . auth()->id(),
            'description' => 'required|string',
            'color' => 'required|string',
        ], [
            'name.unique' => 'Ya existe una categoría con ese nombre.',
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->habilitated = true; 
        $category->color = $validated['color'];
        $category->user_id = auth()->id();

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = auth()->user()->categories()->withCount('posts')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id . ',id,user_id,' . auth()->id(),
            'description' => 'required|string',
            'habilitated' => 'required|in:0,1',
            'color' => 'required|string',
        ], [
            'name.unique' => 'Ya existe una categoría con ese nombre.',
        ]);

        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->color = $validated['color'];

        if ($validated['habilitated'] == '0' && $category->posts_count > 0) {
            return redirect()->back()->with('error', 'No se puede deshabilitar una categoría con posts.');
        }

        $category->habilitated = $validated['habilitated'] == '1';
        $category->save();

        return redirect()->route('categories.show', $category->id)
                         ->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
    }
}
