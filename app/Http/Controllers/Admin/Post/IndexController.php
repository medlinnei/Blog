<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $post = Post::all();
        return view('admin.post.index', compact("post"));
    }
}
