<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([
            'show', 'index'
        ]);
    }

    public function index(User $user)
    {
        $post = Post::where('user_id', $user->id)->latest()->paginate(8);
        return view('dashboard', [
            'user' => $user,
            'posts' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:30',
            'descripcion' => 'required|max:100',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        //otra forma de registrar usando relaciones
        /*
            $request->user()->posts()->create([
                'titulo'=>$request->titulo,
                'descripcion'=>$request->descripcion,
                'imagen'=>$request->imagen,
                'user_id'=>auth()->user()->id
            ]);
        */
        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }


    public function authorize($ability,$arguments=[]){
        return true;
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        $imagenpath = public_path('uploads/' . $post->imagen);

        if(File::exists($imagenpath)){
            unlink($imagenpath);
            
        }

        return redirect()->route('post.index', auth()->user()->username);
    }
}
