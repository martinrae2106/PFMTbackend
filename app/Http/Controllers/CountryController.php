<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CountryCollection;
use App\Country;

class CountryController extends Controller
{
    // all Countries
    public function index()
    {
        return Country::all();
    }

    // add Country
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);
     
        $country = Country::create($data);

        return response($country,201);
    }

    public function get($id)
    {
        $country = Country::find($id);
        return response()->json($country);
    }
    
    public function update($id, Request $request)
    {
        $country = Country::find($id);
        $country->update($request->all());

       // return response()($donation, 200);
       return response()->json('The Country successfully updated', 200);
    }


    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return response('Deleted Country', 200);
    }

}
