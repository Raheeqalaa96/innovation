<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApiCustomerController extends Controller
{
    
    public function index()
    {
        $customers = Customer::get();
        return response()->json($customers);
    }

    public function show($id)
    {
        //$customer = Customer::with('shipments')->findOrFail($id);
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string',
            'phone_number'=> 'required|string|max:100',
            'nationality_id' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $customer = Customer::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone_number' =>$request->phone_number ,
            'nationality_id'=>$request->nationality_id ,
        ]);

        $success = "customer created successfully";
        return response()->json($success);
    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string',
            'phone_number'=> 'required|string|max:100',
            'nationality_id' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $customer = Customer::findOrFail($id);
        ;

        $customer = Customer::update([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone_number' =>$request->phone_number ,
            'nationality_id'=>$request->nationality_id ,
        ]);

       
          //$customer->shipments()->sync($request->shipments_ids);

        $success = "customer updated successfully";

        return response()->json($success);
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        //$customer->shipments()->sync([]);
        $customer->delete();
        $success = "customer deleted successfully";
        return response()->json($success);
    }
}
