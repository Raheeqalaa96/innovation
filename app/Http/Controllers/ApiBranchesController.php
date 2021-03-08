<?php

namespace App\Http\Controllers;
use App\Models\Branches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiBranchesController extends Controller
{
   
    public function index()
    {
        $branshess = Branshes::get();
        return response()->json($branshess);
    }

    public function show($id)
    {
      
        return response()->json($branshes);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone_number'=> 'required|string|max:100',
            'address'=> 'required|string|max:100',
            'area' => 'required|string|max:100',
            'company_id' => 'required'
        ]);
       
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $branshes = Branshes::create([
           
            'address'=>  $request->address,
            'area' =>$request->area,
            'company_id' =>$request->company_id,
            'name' =>$request->name,
            'phone_number' =>$request->phone_number ,
        ]);

        $success = "branshes created successfully";
        return response()->json($success);
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone_number'=> 'required|string|max:100',
            'address'=> 'required|string|max:100',
            'area' => 'required|string|max:100',
            'company_id' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $branshes = Branshes::findOrFail($id);
        ;

        $branshes = Branshes::update([
            
            'address'=>  $request->address,
            'area' =>$request->area,
            'company_id' =>$request->company_id,
            'name' =>$request->name,
            'phone_number' =>$request->phone_number ,
        ]);

       
          //$branshes->shipments()->sync($request->shipments_ids);

        $success = "branshes updated successfully";

        return response()->json($success);
    }

    public function delete($id)
    {
        $branshes = Branshes::findOrFail($id);
        //$branshes->shipments()->sync([]);
        $branshes->delete();
        $success = "branshes deleted successfully";
        return response()->json($success);
    }


}
