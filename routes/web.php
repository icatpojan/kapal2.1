<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cetak/pdf/{id}', 'Web\ReportController@cetak_pdf')->name('report.cetak');
Route::group(['middleware' => ['auth']], function () {

    Route::get('/user', 'Web\UserController@index')->name('user.index');
    Route::post('/user', 'Web\UserController@store')->name('user.store');
    Route::post('/user/{id}', 'Web\UserController@destroy')->name('user.destroy');
    Route::post('/user/update/{id}', 'Web\UserController@update')->name('user.update');

    Route::get('/warehouse', 'Web\WarehouseController@index')->name('warehouse.index');
    Route::post('/warehouse', 'Web\WarehouseController@store')->name('warehouse.store');
    Route::post('/warehouse/{id}', 'Web\WarehouseController@destroy')->name('warehouse.destroy');
    Route::post('/warehouse/update/{id}', 'Web\WarehouseController@update')->name('warehouse.update');

    Route::get('/customer', 'Web\CustomerController@index')->name('customer.index');
    Route::post('/customer', 'Web\CustomerController@store')->name('customer.store');
    Route::post('/customer/{id}', 'Web\CustomerController@destroy')->name('customer.destroy');
    Route::post('/customer/update/{id}', 'Web\CustomerController@update')->name('customer.update');
    Route::post('/customershow', 'Web\CustomerController@show')->name('customer.show');

    Route::get('/ship', 'Web\ShipController@index')->name('ship.index');
    Route::post('/ship', 'Web\ShipController@store')->name('ship.store');
    Route::post('/ship/{id}', 'Web\ShipController@destroy')->name('ship.destroy');
    Route::post('/ship/update/{id}', 'Web\ShipController@update')->name('ship.update');
    Route::post('/shipshow', 'Web\ShipController@show')->name('ship.show');

    Route::get('/product', 'Web\ProductController@index')->name('product.index');
    Route::post('/product', 'Web\ProductController@store')->name('product.store');
    Route::post('/product/{id}', 'Web\ProductController@destroy')->name('product.destroy');
    Route::post('/product/update/{id}', 'Web\ProductController@update')->name('product.update');

    Route::get('/category', 'Web\CategoryController@index')->name('category.index');
    Route::post('/category', 'Web\CategoryController@store')->name('category.store');
    Route::post('/category/{id}', 'Web\CategoryController@destroy')->name('category.destroy');
    Route::post('/category/update/{id}', 'Web\CategoryController@update')->name('category.update');

    Route::get('/status', 'Web\StatusController@index')->name('status.index');
    Route::post('/status', 'Web\StatusController@store')->name('status.store');
    Route::post('/status/{id}', 'Web\StatusController@destroy')->name('status.destroy');
    Route::post('/status/update/{id}', 'Web\StatusController@update')->name('status.update');

    Route::get('/type', 'Web\TypeController@index')->name('type.index');
    Route::post('/type', 'Web\TypeController@store')->name('type.store');
    Route::post('/type/{id}', 'Web\TypeController@destroy')->name('type.destroy');
    Route::post('/type/update/{id}', 'Web\TypeController@update')->name('type.update');

    Route::get('/trash', 'Web\TrashController@index')->name('trash.index');
    Route::post('/restore/{id}', 'Web\TrashController@restore')->name('trash.restore');
    Route::post('/hapus/{id}', 'Web\TrashController@hapus')->name('trash.hapus');

    Route::get('/history', 'Web\HistoryController@index')->name('history.index');

    Route::post('/provincestore', 'Web\CustomerController@provincestore')->name('province.store');
    Route::post('/regionstore', 'Web\CustomerController@regionstore')->name('region.store');

    Route::get('/invoice', 'Web\InvoiceController@index')->name('invoice.index');
    Route::post('/invoice', 'Web\InvoiceController@store')->name('invoice.store');
    Route::post('/cari', 'Web\InvoiceController@cari')->name('invoice.cari');
    Route::post('/invoice/add', 'Web\InvoiceController@add')->name('invoice.add');
    Route::post('/invoice/{id}', 'Web\InvoiceController@destroy')->name('invoice.destroy');
    Route::post('/invoice/update/{id}', 'Web\InvoiceController@update')->name('invoice.update');

    Route::post('/invoicestempel', 'Web\InvoiceController@stempel')->name('invoice.stempel');

    Route::get('/report', 'Web\ReportController@index')->name('report.index');


    Route::get('/mutasi', 'Web\ReportController@mutasiindex')->name('mutasi.index');
    Route::post('/mutasi/add', 'Web\ReportController@mutasiadd')->name('mutasi.add');
    Route::post('/massal', 'Web\ReportController@mutasimass')->name('mutasi.mass');
    Route::post('/mutasi/destroy/{sn}', 'Web\ReportController@mutasidestroy')->name('mutasi.destroy');
});
