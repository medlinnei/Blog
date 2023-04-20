<?php

namespace App\Http\Controllers\Personal\Comments;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;
        return view('personal.comments.index', compact('comments'));
    }
}
