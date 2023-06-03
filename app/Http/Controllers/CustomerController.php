<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends BaseController
{

    protected $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:customers',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        return $this->handleResponse($this->service->register($request), 'Customer successfully registered!');
    }

    public function getCustomerOrdersInCity(Request $request)
    {
        $city=$request->city;
        $date=$request->date;
        $customerName=$request->customer;

        $query=DB::table('customers');

        if ($customerName) {
            $query->where('customers.name', $customerName);
        }

        $query ->select('customers.id', 'customers.name','orders.city',
            DB::raw('SUM(order_items.quantity * products.price) as total_orders_$_'),
            DB::raw('COUNT(orders.id) as number_of_orders'))
                ->join('orders', 'customers.id', '=', 'orders.customer_id')
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->join('products', 'order_items.product_id', '=', 'products.id');

        if ($city) {
            $query->where('orders.city', $city);
        }

        if ($date) {
            $query->whereDate('orders.created_at', $date);
        }

        return  $query->groupBy('customers.id', 'customers.name','orders.city')->get();
    }


    public function totalsCountOrdersByCity()
    {

      return  DB::table('orders')
            ->select( 'orders.city',
                DB::raw('SUM(order_items.quantity * products.price) as total_orders_$_'),
                DB::raw('COUNT(orders.id) as number_of_orders'),
                DB::raw('SUM(order_items.quantity) as number_of_items'))
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
        ->groupBy( 'orders.city')
            ->get();
    }



}
