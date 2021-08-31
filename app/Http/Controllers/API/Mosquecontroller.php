<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MosqueController extends Controller
{
    //
    public function index()
    {
        $mosques = Mosque::all()->toArray();
        return array_reverse($mosques);
    }

    //
    public function add(Request $request)
    {
        $mosque = new Mosque([
            'title' => $request->title,
            'imam_name' => $request->imam_name,
            'phone' => $request->phone,
            'location' => $request->location,
        


            

        ]);
        $mosque->save();

        return response()->json('The Mosque successfully added');
    }

    
    public function edit($id)
    {
        $mosque = Mosque::find($id);
        return response()->json($mosque);
    }

   
    public function update($id, Request $request)
    {
        $mosque = Mosque::find($id);
        $mosque->update($request->all());

        return response()->json('The mosque successfully updated');
    }

    
    public function delete($id)
    {
        $mosque = Mosque::find($id);
        $mosque->delete();

        return response()->json('The mosque successfully deleted');
    }
}
