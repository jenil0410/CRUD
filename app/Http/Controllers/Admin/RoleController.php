<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->$request->validate([
        //     'name' => 'required'
        // ]);
        $roles = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'admin',
        ]);
        // dd($roles->id);
        
        return redirect('roles/edit/' . $roles->id )->with('success', 'Role Created Successfully.!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $tablesArr = [];
        $breadcrumbs = [];
        $pageConfigs = ['pageHeader' => true];
        if ($id) {
            $role = Role::find($id);

            $tables = DB::select('SHOW TABLES');
            // dd($tables);
            foreach ($tables as $table) {
                $host = $request->getHttpHost();
                if ($host == 'localhost') {
                    $tablesArr[$table->Tables_in_mineology_server] = $table->Tables_in_mineology_server;
                } else {
                    $tablesArr[$table->{'Tables_in_' . env('DB_DATABASE')}] = $table->{'Tables_in_' . env('DB_DATABASE')};
                }
            }

            $filterArr = [];

            if($tablesArr['customers']){
                $filterArr['Customer'] = 'Customer';
            }
            if($tablesArr['orders']){
                $filterArr['orders'] = 'orders';
            }
            if($tablesArr['products']){
                $filterArr['products'] = 'products';
            }
            if($tablesArr['roles']){
                $filterArr['roles'] = 'roles';
            }
            if($tablesArr['activity_log']){
                $filterArr['Activity Log'] = 'Activity Log';
            }
            if($tablesArr['users']){
                $filterArr['users'] = 'users';
            }

            $permission = new Permission();
            return view('roles.show', ['pageConfigs' => $pageConfigs, 'role' => $role, 'accessData' => $filterArr, 'permission' => $permission]);
        }else
        return Redirect::back()->with('error', 'ID not selected or not found.!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $tablesArr = [];
        $breadcrumbs = [];
        $pageConfigs = ['pageHeader' => true];
        if ($id) {
            $role = Role::find($id);

            $tables = DB::select('SHOW TABLES');
            // dd($tables);
            foreach ($tables as $table) {
                $host = $request->getHttpHost();
                if ($host == 'localhost') {
                    $tablesArr[$table->Tables_in_mineology_server] = $table->Tables_in_mineology_server;
                } else {
                    $tablesArr[$table->{'Tables_in_' . env('DB_DATABASE')}] = $table->{'Tables_in_' . env('DB_DATABASE')};
                }
            }

            $filterArr = [];

            if($tablesArr['customers']){
                $filterArr['Customer'] = 'Customer';
            }
            if($tablesArr['orders']){
                $filterArr['orders'] = 'orders';
            }
            if($tablesArr['products']){
                $filterArr['products'] = 'products';
            }
            if($tablesArr['roles']){
                $filterArr['roles'] = 'roles';
            }
            if($tablesArr['activity_log']){
                $filterArr['Activity Log'] = 'Activity Log';
            }
            if($tablesArr['users']){
                $filterArr['users'] = 'users';
            }
            // if($tablesArr['roles']){
            //     $filterArr['roles'] = 'roles';
            // }
            // if($tablesArr['roles']){
            //     $filterArr['roles'] = 'roles';
            // }

            $permission = new Permission();
            // dd($permission);
            return view('roles.update', ['pageConfigs' => $pageConfigs, 'role' => $role, 'accessData' => $filterArr, 'permission' => $permission]);
        }else
        return Redirect::back()->with('error', 'ID not selected or not found.!');

        // return view('roles.update',compact('roles','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        // dd($param);
        $role = Role::find($param['id']);
        // dd($role);
        $validator = validator($param, [
            'name' => ['required', 'string', 'max:20', 'unique:roles,name,' . $role->id],
        ]);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        $role_id = $param['id'];
        // dd($role_id);
        if (!empty($param['permission'])) {
            Permission::where('Role_id', $role_id)->delete();
            foreach ($param['permission'] as $key => $value) {
                $value['module'] = $key;
                $value['Role_id'] = $role_id;
                Permission::create($value);
            }
            // dd($param['permission']);
        } else {
            Permission::where('Role_id', $role_id)->delete();
        }
        if (!empty($param)) {

            $role = Role::find($param['id']);
            unset($param['id']);
            $isUpdated = $role->update($param);
            if ($isUpdated) {
                return redirect()->back()->with('success', 'Updated Successfully.!');
            } else {
                return Redirect::back()->with('error', 'Something Wrong happend.!');
            }
        } else {
            return Redirect::back()->with('error', 'ID not selected or not found.!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        // dd($role);
        $role->delete();
        return redirect()->route('role.index');
    }
}