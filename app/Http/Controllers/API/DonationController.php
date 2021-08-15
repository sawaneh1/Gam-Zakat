<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::all()->toArray();
        return array_reverse($donations);
    }

    //
    public function add(Request $request)
    {
        $donation = new Donation([
            'from' => $request->from,
            'address' => $request->address,
            'phone' => $request->phone,
            'amount' => $request->amount


        ]);
        $donation->save();

        return response()->json('The donation successfully added');
    }

    
    public function edit($id)
    {
        $donation = Donation::find($id);
        return response()->json($donation);
    }

   
    public function update($id, Request $request)
    {
        $donation = Donation::find($id);
        $donation->update($request->all());

        return response()->json('The donation successfully updated');
    }

    
    public function delete($id)
    {
        $donation = Donation::find($id);
        $donation->delete();

        return response()->json('The donation successfully shared');
    }
}
