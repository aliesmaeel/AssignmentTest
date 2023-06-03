<?php


namespace App\Http\Services;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerService
{
    public function register(Request $request)
    {
     $customer= Customer::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);

        $success['token'] =  $customer->createToken('assignmentTest')->plainTextToken;
        $success['customer'] =  $customer;

        return $success;
    }
}
