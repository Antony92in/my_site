<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;


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
            'category' => [
                'required',
                'integer',
                Rule::in(Post::CATEGORIES),
            ],
            'author_id' => ['required', 'integer'],
        ]);

        $post = new Post();
        $post->title = $data->title;
        $post->content = $data->body;
        $post->category = $data->category;
        $post->author_id = $data->author_id;
        $post->created_at = time();
        $post->save();
    }
}
