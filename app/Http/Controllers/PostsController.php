<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller

{
	public function index()

	{
		$posts = Post::orderBy('id', 'desc')->get();

		return view('posts.index')->with(['posts' => $posts]);

	}    

	public function show(Post $post) //laravel se encarga de buscar en la clase POST el $post (que es el id del post)

	{

		return view('posts.show')->with(['post' => $post]);
	}    


	public function create()
	{
		return view('posts.create');
	}


	public function store(CreatePostRequest $request)
	{
		$post = Post::create($request->only('title', 'description', 'url'));

		return redirect()->route('posts_path');
	}
}
