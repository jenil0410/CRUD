<?php

namespace App\Http\Controllers;
use illuminate\support\Facades;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Products;
use Yajra\DataTables\Facades\DataTables;

class OrderdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $orders = Orders::with(['product', 'customer'])->get();
            
            return DataTables::of($orders)
                ->addColumn('product_name', function ($order) {
                    return $order->product->pname;
                })
                ->addColumn('customer_name', function ($order) {
                    return $order->customer->fname;
                })
                ->addColumn('customer_email', function ($order) {
                    return $order->customer->email;
                })
                ->rawColumns(['product_name', 'customer_name', 'customer_email'])
                ->make(true);
        }

        return view('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
