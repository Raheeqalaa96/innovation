<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApiCompanyController extends Controller
{
    
    public function index()
    {
        $companies = Company::get();
        return response()->json($companies);
    }

    public function show($id)
    {
        return response()->json($company);
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

        $company = Company::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone_number' =>$request->phone_number ,
            'nationality_id'=>$request->nationality_id ,
        ]);

        $success = "company created successfully";
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
        $company = Company::findOrFail($id);
        $company = Company::update([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone_number' =>$request->phone_number ,
            'nationality_id'=>$request->nationality_id ,
        ]);
        $success = "company updated successfully";
        return response()->json($success);
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        $success = "company deleted successfully";
        return response()->json($success);
    }
}
