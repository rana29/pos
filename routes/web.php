<?php

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


/***********************logincontroller*************************************/


Route::group(['middleware'=>['auth','admin','login','verified']],function(){

Route::prefix('admin')->name('admin.')->group(function(){

Route::get('/dashbord','AdminController@dashbord')->name('dashbord');

});

}); 


Route::group(['middleware'=>['auth','author','login']],function(){

Route::prefix('author')->name('author.')->group(function(){

Route::get('/dashbord','AuthorController@dashbord')->name('dashbord');

	
});
});


/******************Productcontroller***********************/


Route::prefix('supplier')->name('supplier.')->group(function(){

    
	Route::get('/create','SupplierController@create')->name('create');
	Route::post('/store','SupplierController@store')->name('store');
	Route::get('/manage','SupplierController@manage')->name('manage');
	Route::get('/active/{id}/{status}','SupplierController@active')->name('active');
	Route::get('/edit/{id}','SupplierController@edit')->name('edit');
	Route::post('/update/{id}','SupplierController@update')->name('update');
	Route::get('/delete/{id}','SupplierController@delete')->name('delete');
	
}); 



/************************customercontroller**************************/


Route::prefix('customer')->name('customer.')->group(function(){

    
	Route::get('/create','customercontroller@create')->name('create');
	Route::post('/store','customercontroller@store')->name('store');
	Route::get('/manage','customercontroller@manage')->name('manage');
	Route::get('/active/{id}/{status}','customercontroller@active')->name('active');
	Route::get('/edit/{id}','customercontroller@edit')->name('edit');
	Route::post('/update/{id}','customercontroller@update')->name('update');
	Route::get('/delete/{id}','customercontroller@delete')->name('delete');
	
}); 



/************************unitcontroller**************************/


Route::prefix('unit')->name('unit.')->group(function(){

    
	Route::get('/create','unitcontroller@create')->name('create');
	Route::post('/store','unitcontroller@store')->name('store');
	Route::get('/manage','unitcontroller@manage')->name('manage');
	Route::get('/active/{id}/{status}','unitcontroller@active')->name('active');
	Route::get('/edit/{id}','unitcontroller@edit')->name('edit');
	Route::post('/update/{id}','unitcontroller@update')->name('update');
	Route::get('/delete/{id}','unitcontroller@delete')->name('delete');
	
}); 

/************************catagorycontroller**************************/

Route::prefix('catagory')->name('catagory.')->group(function(){

    
	Route::get('/create','catagorycontroller@create')->name('create');
	Route::post('/store','catagorycontroller@store')->name('store');
	Route::get('/manage','catagorycontroller@manage')->name('manage');
	Route::get('/active/{id}/{status}','catagorycontroller@active')->name('active');
	Route::get('/edit/{id}','catagorycontroller@edit')->name('edit');
	Route::post('/update/{id}','catagorycontroller@update')->name('update');
	Route::get('/delete/{id}','catagorycontroller@delete')->name('delete');
	
}); 


/************************productcontroller**************************/

Route::prefix('product')->name('product.')->group(function(){

    
	Route::get('/create','productcontroller@create')->name('create');
	Route::post('/store','productcontroller@store')->name('store');
	Route::get('/manage','productcontroller@manage')->name('manage');
	Route::get('/active/{id}/{status}','productcontroller@active')->name('active');
	Route::get('/edit/{id}','productcontroller@edit')->name('edit');
	Route::post('/update/{id}','productcontroller@update')->name('update');
	Route::get('/delete/{id}','productcontroller@delete')->name('delete');
	
}); 



/************************purchasecontroller**************************/

Route::prefix('purchase')->name('purchase.')->group(function(){

    
	Route::get('/create','purchasecontroller@create')->name('create');
	Route::post('/store','purchasecontroller@store')->name('store');
	Route::get('/manage','purchasecontroller@manage')->name('manage');
	Route::get('/active/{id}/{status}','purchasecontroller@active')->name('active');
	Route::get('/edit/{id}','purchasecontroller@edit')->name('edit');
	Route::post('/update/{id}','purchasecontroller@update')->name('update');
	Route::get('/delete/{id}','purchasecontroller@delete')->name('delete');
	
	Route::get('/approved','purchasecontroller@pending_list')->name('pending');
	Route::get('pending/approved/{id}','purchasecontroller@pending_approved')->name('pending.approved');
	
}); 


Route::post('show/catagory','purchasecontroller@showcatagory')->name('show.catagory');
Route::post('show/product','purchasecontroller@showproduct')->name('show.product');

  
  /*invoice route*/
Route::prefix('invoice')->name('invoice.')->group(function(){

    
	Route::get('/create','invoicecontroller@create')->name('create');
	Route::post('/store','invoicecontroller@store')->name('store');
	Route::get('/manage','invoicecontroller@manage')->name('manage');
	Route::get('/active/{id}/{status}','invoicecontroller@active')->name('active');
	Route::get('/edit/{id}','invoicecontroller@edit')->name('edit');
	Route::post('/update/{id}','invoicecontroller@update')->name('update');
	Route::get('/delete/{id}','invoicecontroller@delete')->name('delete');
	
	Route::get('/approved','invoicecontroller@pending_list')->name('pending');
	Route::get('pending/approved/{id}','invoicecontroller@pending_approved')->name('pending.approved');
	
});

Route::post('show/product','invoicecontroller@showproduct')->name('show.product');
Route::get('current/product','invoicecontroller@current_stock')->name('current.stock');