<?php

namespace App\Http\Controllers;

use App\CustomerList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function list(){
//        $list=[
//            'one',
//            'two',
//            'three',
//        ];
        $activeCustomer=CustomerList::active()->get();
        $inactiveCustomer=CustomerList::inactive()->get();
//        dd($activeCustomer);
//        $list=CustomerList::all();

//        dd($list);

//        return view('customer',['activeCustomers'=>$activeCustomer, 'inactiveCustomers'=>$inactiveCustomer]);
        return view('customer',compact('activeCustomer','inactiveCustomer'));
    }
    public function store(){
            $date= request()->validate([
                'name'=>'required|min:3',
                'email'=>'required|email',
                'active'=>'required'
            ]);

        $customerlist= new CustomerList();
//        $customerlist->name= request('customer_name');
//        $customerlist->email= request('email');
//        $customerlist->active=request('active');
//        $customerlist->save();
        CustomerList::create($date);
        return back();
//        dd(request('customer_name'));
    }
}
