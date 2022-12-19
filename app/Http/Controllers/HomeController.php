<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()->orderByDesc('created_at')->get();

        return Inertia::render('Home', compact('posts'));
    }
}
