<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DonatorCollection;
use App\Donator;

class DonatorController extends Controller
{
    // all Donators
    public function index()
    {
        return Donator::all();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'fullName' => 'required|string',
            'emailAddress' => 'required|string',
            'postalCode' => 'required|string',
            'billingAddress1' => 'required|string',
            'billingAddress2' => '',
            'cityTown' => 'required|string', 
            'region' => '',
            'emailContactApproved' => 'boolean',
            'childName' => '',
            'teacherName' => '',
        ]);
     
        $donator = Donator::create($data);

        return response($donator,201);
    }


    public function get($id)
    {
        $donator = Donator::find($id);
        return response()->json($donator);
    }


    public function update($id, Request $request)
    {
        $donator = Donator::find($id);
        $donator->update($request->all());

       // return response()($donation, 200);
       return response()->json('The Donator successfully updated', 200);
    }


    public function destroy($id)
    {
        $donator = Donator::find($id);
        $donator->delete();

        return response('Deleted Donator', 200);
    }
}
