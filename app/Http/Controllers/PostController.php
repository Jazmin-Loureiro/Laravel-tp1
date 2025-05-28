<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Funcion que muestra la lista de posts 
     */
    public function index() {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
    }

     /**
    * Funcion que muestra un post especifico por id
    */
    public function show($id) {
    $post = Post::findOrFail($id);
    return view('posts.show', ['post' => $post]);
    }

     /**
     * Muestra el formulario para editar un post específico.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

   /**
    * Muestra el formulario para crear un nuevo post.
    */
    public function create() {
    return view('posts.create');}

    /**
     * Crea un nuevo post en la base de datos.
     * Valida los datos del formulario y guarda el post.
     * Redirige a la lista de posts con un mensaje de éxito.
     */
   public function store(Request $request)
{
    $validated = $request->validate(
        [
            'title' => 'required|string|max:255',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif',
            'content' => 'required|string',
        ],
        [
            'poster.required' => 'Debes subir una imagen.',
            'poster.image' => 'El archivo debe ser una imagen.',
        ]
    );

    $imagePath = $request->file('poster')->store('posters', 'public');

    $post = new Post();
    $post->title = $validated['title'];
    $post->poster = $imagePath;
    $post->content = $validated['content'];

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
}

    /**
    * Actualiza un post existente en la base de datos.
    */
    public function update(Request $request, string $id) {
    $post = Post::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'poster' => 'required|url',
        'content' => 'required|string',
        'habilitated' => 'required|in:0,1',
    ]);

    $post->title = $validated['title'];
    $post->poster = $validated['poster'];
    $post->content = $validated['content'];
    $post->habilitated = $validated['habilitated'] == '1'; // convertir a booleano

    $post->save();
    return redirect()->route('posts.show', $post->id)
                     ->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
