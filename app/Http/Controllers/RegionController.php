<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RegionCollection;
use App\Region;

class RegionController extends Controller
{

    public function index()
    {
        return Region::all();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'   
        ]);
     
        $region = Region::create($data);

        return response($region,201);
    }

    public function get($id)
    {
        $region = Region::find($id);
        return response()->json($region);
    }

    public function update(Request $request, Region $region){
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $region->update($data);

        return response($region, 200);
    }

    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();

        return response('Deleted Region', 200);
    }


}
