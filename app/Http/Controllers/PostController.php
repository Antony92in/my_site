<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * @param Request $data
     */
    public function create(Request $data)
    {
        $validation = $data->validate([
            'title' => ['required', 'max:300'],
            'body' => ['required'],
            'author_id' => ['required', 'integer'],
        ]);

        $post = new Post();
        $post->title = $data->title;
        $post->content = $data->body;
        $post->author = $data->author_id;
        $post->save();

    }
}
