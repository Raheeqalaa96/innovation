<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;

class ApiStoreController extends Controller
{
    
    public function index()
    {
        $stores = Store::get();
        return response()->json($stores);
    }

    public function show($id)
    {
      
        return response()->json($store);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone_number'=> 'required|string|max:100',
            'area' => 'required|string|max:100',
            'cbranch_id' => 'required',
            'employee_id' => 'required',
        ]);

    

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $store = Store::create([
            'area' =>$request->area,
            'branch_id' =>$request->company_id,
            'employee_id' =>$request->employee_id,
            'name' =>$request->name,
            'phone_number' =>$request->phone_number ,
        ]);

        $success = "store created successfully";
        return response()->json($success);
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone_number'=> 'required|string|max:100',
            'area' => 'required|string|max:100',
            'branch_id' => 'required',
            'employee_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $store = Store::findOrFail($id);
        ;

        $store = Store::update([
            'area' =>$request->area,
            'brance_id' =>$request->company_id,
            'employee_id' =>$request->employee_id,
            'name' =>$request->name,
            'phone_number' =>$request->phone_number ,
        ]);

       
          //$store->shipments()->sync($request->shipments_ids);

        $success = "store updated successfully";

        return response()->json($success);
    }

    public function delete($id)
    {
        $store = Store::findOrFail($id);
        //$store->shipments()->sync([]);
        $store->delete();
        $success = "store deleted successfully";
        return response()->json($success);
    }

}
