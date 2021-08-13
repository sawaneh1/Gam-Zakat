<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\ZakatItem;

use Illuminate\Http\Request;

class ZakatItemController extends Controller
{
    //
    public function index()
    {
        $zakatitems = ZakatItem::all()->toArray();
        return array_reverse($zakatitems);
    }

    
    public function add(Request $request)
    {
        $zakatitem = new ZakatItem([
            'name' => $request->name,
            'rate' => $request->rate,
            'category'=> $request->category
        ]);
        $zakatitem->save();

        return response()->json('The zakatitem successfully added');
    }


    public function edit($id)
    {
        $zakatitem = ZakatItem::find($id);
        return response()->json($zakatitem);
    }

    
    public function update($id, Request $request)
    {
        $zakatitem = ZakatItem::find($id);
        $zakatitem->update($request->all());

        return response()->json('The ZakatItem successfully updated');
    }


    public function delete($id)
    {
        $zakatitem= ZakatItem::find($id);
        $zakatitem->delete();

        return response()->json('The zakatitem successfully deleted');
    }
}
