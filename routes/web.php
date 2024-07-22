<?php

use App\Http\Controllers\ActivitylogController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserroleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Profile2Controller;
use App\Http\Controllers\OrderdataController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use Spatie\Activitylog\Models\Activity;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/log',function(){
  return Activity::all();
});

Route::get('/userd', function () {
  return view('layouts.sections.menu.userdash');
});

Route::get('/permission', function () {
  return view('permissions.index');
});

Route::group(['prefix' => 'log','middleware' => 'auth'], function() {
  route::get('/',[ActivitylogController::class, 'index'])->name('menu');
  });

Route::group(['prefix' => 'menu','middleware' => 'auth'], function() {
route::get('/',[DashboardController::class, 'index'])->name('menu');
});
route::get('/chart',[DashboardController::class,'chart'])->name('chart');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// product form
Route::group(['prefix' => 'product','middleware' => ['auth','role:admin']], function() {
  Route::get('/', [ProductController::class, 'index'])->name('product.index');
  Route::group(['middleware' => 'permission:create'],function(){
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/insert', [ProductController::class, 'store'])->name('product.insert');
  });
  Route::group(['middleware' => 'permission:update'],function(){
  Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
  });
  Route::group(['middleware' => 'permission:delete'],function(){
  Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
  Route::get('/export', [ProductController::class , 'export'])->name('product.export');
});
Route::get('/datatable', [ProductController::class, 'data'])->name('product.data');
});

Route::group(['prefix' => 'customer' , 'middleware' => ['auth','role:user']], function(){
  Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
  Route::group(['middleware' => 'permission:create'],function(){
  Route::get('/create', [CustomerController::class , 'create'])->name('customer.create');
  Route::post('/insert' , [CustomerController::class, 'store'])->name('customer.store');
  });
  Route::group(['middleware' => 'permission:update'],function(){
  Route::get('/edit/{id}' , [CustomerController::class, 'edit'])->name('customer.edit');
  Route::post('/update/{id}' , [CustomerController::class, 'update'])->name('customer.update');
  });
  Route::group(['middleware' => 'permission:delete'],function(){
  Route::get('/delete/{id}' , [CustomerController::class, 'destroy'])->name('customer.delete');
  Route::get('/export', [CustomerController::class , 'export'])->name('customer.export');
  Route::get('/import', [CustomerController::class , 'fimport'])->name('customer.import');
  Route::post('/importfile', [CustomerController::class , 'Import'])->name('customer.fimport');
});
Route::get('/datatable', [CustomerController::class, 'data'])->name('customer.data');
});

Route::group(['prefix' => 'order' , 'middleware' => 'auth'], function(){
  Route::get('/', [OrderController::class, 'index'])->name('order.index');
  Route::get('/create', [OrderController::class , 'create'])->name('order.create');
  Route::get('/show/{id}', [OrderController::class,'show'])->name('order.show');
  Route::post('/insert' , [OrderController::class, 'store'])->name('order.store');
  Route::get('/edit/{id}' , [OrderController::class, 'edit'])->name('order.edit');
  Route::post('/update/{id}' , [OrderController::class, 'update'])->name('order.update');
  Route::get('/delete/{id}' , [OrderController::class, 'destroy'])->name('order.delete');
  Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
  Route::get('/export', [OrderController::class , 'export'])->name('order.export');
  Route::get('/datatable', [OrderController::class, 'data'])->name('order.data');
  Route::get('/dash',[OrderController::class, 'countorder']);
  Route::get('/importview', [OrderController::class , 'importView'])->name('order.view');
  Route::post('/import', [OrderController::class , 'import'])->name('order.import');  
  
});
Route::get('/form',[OrderController::class, 'form']);

Route::group(['prefix' => 'profile2' , 'middleware' => ['auth','role:admin']], function(){
  Route::get('/update', [Profile2Controller::class, 'index'])->name('profile2.index');
  Route::post('/store', [Profile2Controller::class, 'store'])->name('profile2.store');
  Route::get('/delete', [Profile2Controller::class, 'create'])->name('profile2.create');
});

Route::group(['prefix' => 'permission' , 'middleware' => ['auth','role:admin']], function(){
  Route::get('/index',[PermissionController::class, 'index'])->name('permission.index');
  Route::get('/create',[PermissionController::class, 'create'])->name('permission.create');
  Route::post('/store',[PermissionController::class, 'store'])->name('permission.store');
  Route::get('/data',[PermissionController::class, 'data'])->name('permission.data');
  Route::post('/update/{id}',[PermissionController::class, 'update'])->name('permission.update');
  Route::get('/edit/{id}',[PermissionController::class, 'edit'])->name('permission.edit');
  Route::get('/delete/{id}',[PermissionController::class, 'destroy'])->name('permission.delete');
});

Route::group(['prefix' => 'roles' , 'middleware' => ['auth','role:admin']], function(){
  Route::get('/index',[RoleController::class, 'index'])->name('role.index');
  Route::get('/create',[RoleController::class, 'create'])->name('role.create');
  Route::post('/store',[RoleController::class, 'store'])->name('role.store');
  Route::get('/data',[RoleController::class, 'data'])->name('role.data');
  Route::post('/update/{id}',[RoleController::class, 'update'])->name('role.update');
  Route::get('/edit/{id}',[RoleController::class, 'edit'])->name('role.edit');
  Route::get('/delete/{id}',[RoleController::class, 'destroy'])->name('role.delete');
});

Route::group(['prefix' => 'spatie' , 'middleware' => ['auth','role:admin']], function(){
  Route::get('/index',[IndexController::class, 'index'])->name('assign.index');
  Route::post('/assign',[IndexController::class, 'store'])->name('assign.store'); 
});

  Route::group(['prefix' => 'userrole' , 'middleware' => ['auth','role:admin']], function(){
    Route::get('/index',[UserroleController::class, 'index'])->name('urole.index');
    Route::post('/assignrole',[UserroleController::class, 'store'])->name('urole.store');
  });


  Route::get('/userr', [ProfileController::class, 'checkuser']);