<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customers::all(); 
        return view("customers.index" ,compact('customer')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $customer = $request->all();

        $validation = validator($customer,[
            'fname' => 'required|string|max:22',
            'lname'=>'required|string|max:22',
            'email' => 'required|email|max:44',
            'address' => 'required|max:100',
            'pcode' => 'required|numeric',
            'ctype' => 'required',
            'phone' => 'required|numeric|digits:10',
            'state' => 'required|string',
            'city' => 'required'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        Customers::create($customer);
        return redirect()->route('customer.index')->with("success","succes");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customers::find($id);
        return view('customers.update',compact('id','customer'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customers::find($id);

        $params = $request->all();

        $validation = validator($params,[
            'fname' => 'required|string|max:22',
            'lname'=>'required|string|max:22',
            'email' => 'required|email|max:44',
            'address' => 'required|max:100',
            'pcode' => 'required|numeric',
            'ctype' => 'required',
            'phone' => 'required|numeric|digits:10',
            'state' => 'required|string',
            'city' => 'required'
        ]);

        $customer->update($params);
        return redirect()->route('customer.index')->with("success","succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $custormer = Customers::find($id);
        $custormer->delete();
        return redirect()->route('customer.index')->with("success","success");
    }

    public function export() 
    {
        return Excel::download(new CustomersExport, 'users.xlsx');
    }

    public function data() 
    {
        $customers = Customers::query()->get();
      return DataTables::of($customers)->make(true);
    }

    public function countdata(){
        $param = Customers::count();
        return view('layouts.sections.menu.menu',compact('param'));
    }
}