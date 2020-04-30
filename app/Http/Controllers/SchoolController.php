<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SchoolCollection;
use App\School;

class SchoolController extends Controller
{

    public function index()
    {
        return School::all();
    }

  
    public function store(Request $request)
    {
        $data = $request->validate([
            'roleNumber' => 'required|string',
            'name' => 'required|string'   
        ]);
     
        $school = School::create($data);

        return response($school,201);
    }

    public function get($id)
    {
        $school = School::find($id);
        return response()->json($school);
    }
  

    public function update(Request $request, School $school){
        $data = $request->validate([
            'roleNumber' => 'required|string',
            'name' => 'required|string'
        ]);

        $school->update($data);

        return response($school, 200);
    }

 
    public function destroy($id)
    {
        $school = School::find($id);
        $school->delete();

        return response('Deleted School', 200);
    }
}
