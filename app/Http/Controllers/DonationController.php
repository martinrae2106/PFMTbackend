<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DonationCollection;
use App\Donation;

class DonationController extends Controller
{
    // all Donations
    public function index()
    {
        return Donation::all();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'donationValue' => 'required|integer',
            'stripeToken' => 'string',
            'transactionStatus'=> 'string'
        ]);
     
        $donation = Donation::create($data);

        return response($donation,201);
    }

    public function get($id)
    {
        $donation = Donation::find($id);
        return response()->json($donation);
    }


    public function update($id, Request $request)
    {
        $donation = Donation::find($id);
        $donation->update($request->all());

       // return response()($donation, 200);
       return response()->json('The Donation successfully updated', 200);
    }



    public function destroy($id)
    {
        $donation = Donation::find($id);
        $donation->delete();

        return response('Deleted Donation', 200);
    }
}
