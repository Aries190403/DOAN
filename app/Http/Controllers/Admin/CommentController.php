<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list()
    {
        return view('admin.comment.list', [
            'title' => 'List Comment',
            'comments' => Comment::where('deleted_at', NULL)->get()
        ]);
    }
}
