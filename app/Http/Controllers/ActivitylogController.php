<?php

namespace App\Http\Controllers;


use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivitylogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customer = Activity::Where('subject_type',Customers::class)->get();
        // $product = Activity::Where('subject_type',Products::class)->get();
        // $order = Activity::Where('subject_type',Orders::class)->get();
        // dd($order);
        // $alllogs = collect()
        //         ->merge($customer)
        //         ->merge($product)
        //         ->merge($order);
        // $alllogs = $alllogs->sortByDesc('Created_at');
        $log = Activity ::all()->last();
        dd($log);
        return view('activitylog.activitylog',compact('log'));
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
        //
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
