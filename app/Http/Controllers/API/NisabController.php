<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Nisab;
use Illuminate\Http\Request;

class NisabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nisabs = Nisab::all()->toArray();
        return array_reverse($nisabs);
    }

    //
    public function add(Request $request)
    {
        $nisab = new Nisab([
            'nisab' => $request->nisab,
            'statement' => $request->statement
        ]);
        $nisab->save();

        return response()->json('The Nisab successfully added');
    }

    
    public function edit($id)
    {
        $nisab = Nisab::find($id);
        return response()->json($nisab);
    }

   
    public function update($id, Request $request)
    {
        $nisab = Nisab::find($id);
        $nisab->update($request->all());

        return response()->json('The Nisab successfully updated');
    }

    
    public function delete($id)
    {
        $nisab = Nisab::find($id);
        $nisab->delete();

        return response()->json('The nisab successfully deleted');
    }
}
