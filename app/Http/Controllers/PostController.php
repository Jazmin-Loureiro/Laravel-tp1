<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
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
    $post = Post::with('category')->findOrFail($id); // Utiliza with para cargar la relación category junto con el post
    return view('posts.show', ['post' => $post]);}


     /**
     * Muestra el formulario para editar un post específico.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all(); // Obtener todas las categorías para el formulario
        return view('posts.edit', ['post' => $post , 'categories' => $categories]);
    }

   /**
    * Muestra el formulario para crear un nuevo post.
    */
    public function create() {
    $categories = Category::all(); 
    return view('posts.create', compact('categories'));}

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
            'poster' => 'required',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ],
    );

    $imagePath = $request->file('poster')->store('posters', 'public');

    $post = new Post();
    $post->title = $validated['title'];
    $post->poster = $imagePath;
    $post->habilitated = true; 
    $post->content = $validated['content'];
    $post->category_id = $validated['category_id'];

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
}

    /**
    * Actualiza un post existente en la base de datos.
    */
    public function update(Request $request, string $id) {
    $post = Post::findOrFail($id);
    $habilitated = $request->boolean('habilitated'); // ← convierte 'true' o '1' a booleano real
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'poster' => 'required',
        'content' => 'required|string',
        'habilitated' => 'required|boolean',
        'category_id' => 'required|exists:categories,id',
    ]);

    if ($request->hasFile('poster')) {
        $imagePath = $request->file('poster')->store('posters', 'public');
        $post->poster = $imagePath;
    }
    
    $post->title = $validated['title'];
    $post->content = $validated['content'];
    $post->habilitated = $habilitated;
    $post->category_id = $validated['category_id']; 

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
