<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Mostrar lista de posts del usuario autenticado
     */
    public function index() {
        $posts = auth()->user()->posts()->with('category')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Mostrar post específico solo si pertenece al usuario
     */
    public function show($id) {
        $post = auth()->user()->posts()->with('category')->findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Mostrar formulario para editar un post del usuario
     */
    public function edit(string $id)
    {
        $post = auth()->user()->posts()->findOrFail($id);
        $categories = auth()->user()->categories()->get();
        return view('posts.edit', ['post' => $post , 'categories' => $categories]);
    }

    /**
     * Mostrar formulario para crear post nuevo
     */
    public function create() {
        $categories = auth()->user()->categories()->get(); 
        return view('posts.create', compact('categories'));
    }

    /**
     * Guardar nuevo post relacionado al usuario autenticado
     */
    public function store(Request $request)
    { 
        $validated = $request->validate(
            [
                'title' => 'required|string|max:50',
                'poster' => 'required|image',
                'content' => 'required|string|max:1500',
                'category_id' => 'required|exists:categories,id',
            ],
        );

        $category = auth()->user()->categories()->findOrFail($validated['category_id']);

        $imagePath = $request->file('poster')->store('posters', 'public');

        $post = new Post();
        $post->title = $validated['title'];
        $post->poster = $imagePath;
        $post->habilitated = true; 
        $post->content = $validated['content'];
        $post->category_id = $category->id;
        $post->user_id = auth()->id();

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }

    /**
     * Actualizar post solo si pertenece al usuario
     */
    public function update(Request $request, string $id) {
        $post = auth()->user()->posts()->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:1500',
            'habilitated' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $category = auth()->user()->categories()->findOrFail($validated['category_id']);

        if ($request->hasFile('poster')) {
            $imagePath = $request->file('poster')->store('posters', 'public');
            $post->poster = $imagePath;
        }
        
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->habilitated = $validated['habilitated'];
        $post->category_id = $category->id;

        $post->save();

        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
