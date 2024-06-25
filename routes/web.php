<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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


Route::group(['prefix' => 'menu','middleware' => 'auth'], function() {
route::get('/',[DashboardController::class, 'index'])->name('menu');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// product form
Route::group(['prefix' => 'product','middleware' => 'auth'], function() {
  Route::get('/', [ProductController::class, 'index'])->name('product.index');
  Route::get('/create', [ProductController::class, 'create'])->name('product.create');
  Route::post('/insert', [ProductController::class, 'store'])->name('product.insert');
  Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
  Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
  Route::get('/export', [ProductController::class , 'export'])->name('product.export');
  Route::get('/datatable', [ProductController::class, 'data'])->name('product.data');
});

Route::group(['prefix' => 'customer' , 'middleware' => 'auth'], function(){
  Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
  Route::get('/create', [CustomerController::class , 'create'])->name('customer.create');
  Route::post('/insert' , [CustomerController::class, 'store'])->name('customer.store');
  Route::get('/edit/{id}' , [CustomerController::class, 'edit'])->name('customer.edit');
  Route::post('/update/{id}' , [CustomerController::class, 'update'])->name('customer.update');
  Route::get('/delete/{id}' , [CustomerController::class, 'destroy'])->name('customer.delete');
  Route::get('/export', [CustomerController::class , 'export'])->name('customer.export');
  Route::get('/datatable', [CustomerController::class, 'data'])->name('customer.data');
  Route::get('/import', [CustomerController::class , 'fimport'])->name('customer.import');
  Route::get('/importfile', [CustomerController::class , 'import'])->name('customer.fimport');
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
  
});
Route::get('/form',[OrderController::class, 'form']);

Route::group(['prefix' => 'profile2' , 'middleware' => 'auth'], function(){
  Route::get('/update', [Profile2Controller::class, 'index'])->name('profile2.index');
  Route::post('/store', [Profile2Controller::class, 'store'])->name('profile2.store');
  Route::get('/delete', [Profile2Controller::class, 'create'])->name('profile2.create');
});