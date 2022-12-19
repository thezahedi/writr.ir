<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->orderByDesc('id')->select('id', 'title')->get();

        return Inertia::render('Posts/Index', compact('posts'));
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => [
                'required'
            ],
            'content' => [
                'required',
            ]
        ]);

        Helper::user()->posts()->create($request->only('title', 'content'));

        return Redirect::route('posts.index');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => [
                'required'
            ],
            'content' => [
                'required',
            ]
        ]);

        return Redirect::route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index');
    }
}
