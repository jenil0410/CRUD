<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Products;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;


class ProductController extends Controller
{

  // public function __construct()
  //   {
  //       $this->middleware('role:products');
  //   }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $user = Products::all();
    $readCheck = Permission::checkCRUDPermissionToUser("products", "read");
    $updateCheck = Permission::checkCRUDPermissionToUser("products", "update");
    $createCheck = Permission::checkCRUDPermissionToUser("products", "create");
    $deleteCheck = Permission::checkCRUDPermissionToUser("products", "delete");
    $isSuperAdmin = Permission::isSuperAdmin();
    return view("products.index", compact('user','readCheck', 'updateCheck' ,'deleteCheck','isSuperAdmin'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("products.create");
  }

  /**
   * Store a newly created resource in storage.
   */
    public function store(Request $request)
    {
      $params = $request->all();

      $validation = validator($params, [
        'pname' => 'required|string|max:22',
        'cname' => 'required|string|max:22',
        'pcate' => 'required',
        'pquantity' => 'required'
      ]);
      if ($validation->fails()) {
        return redirect()->back()->withErrors($validation)->withInput();
      }

      if ($request ->has('image')) {
        $image = $request ->file('image');
        $imagename = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('public\assets\image'), $imagename);
        $params['image'] = $imagename;
      }

      Products::create($params);
      return redirect()->route('product.index')->with("success", "success");
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $user = Products::find($id);
    return view('');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = Products::find($id);
    return view("products.update", compact('id', 'user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $user = Products::find($id);

    $params = $request->all();

    $validation = validator($params, [
      'pname' => 'required|string|max:22',
      'cname' => 'required|string|max:22',
      'pcate' => 'required',
      'pquentity' => 'required|numeric'
    ]);
    
    if ($request->hasFile('image')) {
      $destination = public_path('public\assets\image') . $user->image;
      if ($user->image && file::exists($destination)) {
          file::delete($destination);
      }

      $image = $request->file('image');
      if ($image !== null && $image->isValid()) {
          $imagename = time() . '_' . $image->getClientOriginalName();
          $image->move(public_path('public\assets\image'), $imagename);
          $params['image'] = $imagename;
      }
  }

      
      
    $user->update($params);
    return redirect()->route('product.index')->with("success", "success");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $user = Products::find($id);
    $user->delete();
    return redirect()->route('product.index')->with("success", "success");
  }

  public function export() 
    {
      return Excel::download(new ProductsExport, 'Products.xlsx');

    }

    public function data()
    {
      
      $products = Products::query()->get();
      return DataTables::of($products)->make(true);
    }
}