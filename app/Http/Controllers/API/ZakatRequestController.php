<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ZakatRequest;

class ZakatRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zakatRequests = ZakatRequest::all()->toArray();
        return array_reverse($zakatRequests);
    }

    //
    public function add(Request $request)
    {
        $zakatRequest = new ZakatRequest([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'reason' => $request->reason,

        ]);
        $zakatRequest->save();

        return response()->json('The zakatRequest successfully added');
    }

    
    public function edit($id)
    {
        $zakatRequest = ZakatRequest::find($id);
        return response()->json($zakatRequest);
    }

   
    public function update($id, Request $request)
    {
        $zakatRequest = ZakatRequest::find($id);
        $zakatRequest->update($request->all());

        return response()->json('The zakatRequest successfully updated');
    }

    
    public function delete($id)
    {
        $zakatRequest = ZakatRequest::find($id);
        $zakatRequest->delete();

        return response()->json('The zakatRequest successfully deleted');
    }

}
