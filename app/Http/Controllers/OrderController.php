<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Imports\OrderImport;
use App\Models\Permission;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Services\DataTablesExportHandler;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;






class OrderController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role:orders');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Orders::with('product','customer')->get();
        $products = Products::all();
        $customer = Customers::all();
        $readCheck = Permission::checkCRUDPermissionToUser("orders", "read");
        $updateCheck = Permission::checkCRUDPermissionToUser("orders", "update");
        $createCheck = Permission::checkCRUDPermissionToUser("orders", "create");
        $deleteCheck = Permission::checkCRUDPermissionToUser("orders", "delete");
        $isSuperAdmin = Permission::isSuperAdmin();
        // dd($deleteCheck);
        return view('orders.index',compact('order','products','customer','readCheck', 'updateCheck' ,'deleteCheck','isSuperAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = Orders::all();
        $products = Products::all();
        $customer = Customers::all();
        
    
        
        return view('orders.create',compact('products','customer','order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validation = [];

        
        foreach ($data['oname'] as $index => $oname) {
            
            $validation["oname.$index"] = 'required|max:30';
            $validation["ostatus.$index"] = 'required';
            $validation["saddress.$index"] = 'required|max:100';
            $validation["baddress.$index"] = 'required|max:100';
            $validation["tamount.$index"] = 'required|numeric';
            $validation["discount.$index"] = 'required|numeric';
            $validation["damount.$index"] = 'required|numeric';
            // $validator = Validator::make($data, $validation);
            
            
           
        }
        $validator = Validator::make($data, $validation);

        if ($validator->fails()) {
            // Collect validation messages
            $validationMessages = $validator->errors()->toArray();
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }
        
        foreach ($data['oname'] as $index => $oname) { 
            $order = new Orders();
            $order->oname = $oname;
            $order->productid = $data['productid'][$index];
            $order->customerid = $data['customerid'][$index];
            $order->ostatus = $data['ostatus'][$index];
            $order->saddress = $data['saddress'][$index];
            $order->baddress = $data['baddress'][$index];
            $order->tamount = $data['tamount'][$index];
            $order->discount = $data['discount'][$index];
            $order->damount = $data['damount'][$index];  
            $order->save();
        }

        return redirect()->route('order.index')->with('success', 'Order inserted successfully');
        
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Orders::find($id);
        $customer = Customers::all();
        $product = Products::all();
        return view("orders.invoice",compact('order','customer','product'));
    }

    public function invoice(string $id){
        $order = Orders::find($id);
        $email = $order->customer->email;
        $data = ['order' =>$order];
        $pdf = PDF::loadView('orders.invoice',$data);
        $path = 'storage\invoice' . $order->id . '.pdf';
        Storage::put($path, $pdf->output());

        Mail::send([],[],function($message) use ($email, $pdf) {
            $message->to($email)
                    ->subject('Your Invoice')
                    ->attachData($pdf->output(), 'invoice.pdf');
        });
        
        return $pdf->download('invoice'.$order->id.'.pdf');
        
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Orders::find($id);
        $products = Products::all();
        $customer = Customers::all();
        return view("orders.update", compact('id','order','products','customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = Orders::find($id);

        $order = $request->all();

        $validation = validator($order,[
            'oname' => 'required|alpha_num:ascii|max:30'
            ,'ostatus' => 'required'
            ,'saddress' => 'required',
            'baddress' => 'required',
            'tamount' => 'required|numeric',
            'damount' => 'required|numeric'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
            }
        
        $discountper = $order['discount'];
        $totalamount = $order['tamount'];
        $discount = $totalamount-($discountper/100)*$totalamount;
        $order['damount'] = $discount;

        $params->update($order);
        return redirect()->route('order.index')->with("success","success");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Orders::find($id);
        $order->delete();
        return redirect()->route('order.index')->with("success","success");
    }

    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    public function data()
    {

        {
            $product = Products::all();
            $customer = Customers::all();
            $orders = Orders::with('product', 'customer')->get();
            return DataTables::of($orders)->make(true);
    }
    }

    public function form()
    {
        $order = Orders::all();
        $products = Products::all();
        $customer = Customers::all();
        return view('orders.formrepeat',compact('products','customer','order'));
    }

    public function importView(){
        return view('orders.import');
    }

    public function import(request $request){
        $products = Products::all();
        $customer = Customers::all();
        $validation = validator($request->all(), [
            'file' => 'required|mimes:xlsx,xls',
            
        ]);

        Excel::import(new OrderImport,$request->file('file'));
        return redirect()->route('order.index');
    }
}
