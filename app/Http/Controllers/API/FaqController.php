<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all()->toArray();
        return array_reverse($faqs);
    }

    //
    public function add(Request $request)
    {
        $faq = new Blog([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        $faq->save();

        return response()->json('The faq successfully added');
    }

    
    public function edit($id)
    {
        $faq = Faq::find($id);
        return response()->json($faq);
    }

   
    public function update($id, Request $request)
    {
        $faq = Faq::find($id);
        $faq->update($request->all());

        return response()->json('The faq successfully updated');
    }

    
    public function delete($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return response()->json('The faq successfully deleted');
    }
}
