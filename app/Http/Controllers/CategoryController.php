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
    $categories = Category::all();
    return view('categories.index', compact('categories'));}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
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
    public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255', 
        'description' => 'required|string',
    ]);

    $category = new Category();
    $category->name = $validated['name'];
    $category->description = $validated['description'];

    $category->save(); // Guardar el post en la base de datos
    // Redirigir a la lista de posts con un mensaje de éxito
    return redirect()->route('categories.index')->with('success', 'Categoria creada correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
    $category = Category::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $category->name = $validated['name'];
    $category->description = $validated['description'];

    $category->save();
    return redirect()->route('categories.show', $category->id)
                     ->with('success', 'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
