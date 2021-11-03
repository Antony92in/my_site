<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class IndexController extends Controller
{
    /**
     * @return \Inertia\Response
     *  main page render
     */
    public function index()
    {
        return Inertia::render('Mainpage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'posts' => Post::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
