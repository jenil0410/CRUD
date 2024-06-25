<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Orders::count();
        $param = Customers::count();
        $prod = Products::count();
        return view('layouts.sections.menu.menu', compact('count','param','prod'));
    }

    public function view()
    {
        $count = Orders::count();
        $param = Customers::count();
        $prod = Products::count();
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
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
