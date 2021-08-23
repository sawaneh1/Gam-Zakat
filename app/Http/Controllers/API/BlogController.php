<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::all()->toArray();
        return array_reverse($blogs);
    }

    //
    public function add(Request $request)
    {
        $blog = new Blog([
            'title' => $request->title,
            'text' => $request->text
        ]);
        $blog->save();

        return response()->json('The post successfully added');
    }

    
    public function edit($id)
    {
        $blog = Blog::find($id);
        return response()->json($blog);
    }

   
    public function update($id, Request $request)
    {
        $blog = Blog::find($id);
        $blog->update($request->all());

        return response()->json('The blog successfully updated');
    }

    
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return response()->json('The blog successfully deleted');
    }
}
