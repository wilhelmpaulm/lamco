<?php


Route::get("", function(){
    return View::make('base.login');
});
Route::get("login", function(){
    return View::make('base.login');
});

Route::get("logout", function(){
    Auth::logout();
    return Redirect::to('login');
});

Route::post('login', function(){
   if(Auth::attempt(['id' => Input::get('id'), 'password' => Input::get('password')]))
   {
       if(Auth::user()->department == "purchasing")
       {
           return Redirect::to('purchasing');
       }elseif (Auth::user()->department == "delivery") {
           return Redirect::to('delivery');
       }
       elseif (Auth::user()->department == "production") {
           return Redirect::to('production');
       }
       elseif (Auth::user()->department == "sales") 
       {
           return Redirect::to('sales');
       }
       elseif (Auth::user()->department == "admin") 
       {
           return Redirect::to('admin');
       }
       
   }
   else
       return Redirect::to('login');
});










//Start of controllers here



Route::resource('departments', 'DepartmentsController');
Route::resource('users', 'UsersController');
Route::resource('job_titles', 'Job_titlesController');
Route::resource('system_logs', 'System_logsController');
Route::resource('vendors', 'VendorsController');
Route::resource('dimensions', 'DimensionsController');
Route::resource('paper_types', 'Paper_typesController');
Route::resource('weights', 'WeightsController');
Route::resource('locations', 'LocationsController');
Route::resource('callipers', 'CallipersController');
Route::resource('warehouses', 'WarehousesController');
Route::resource('rolls', 'RollsController');
Route::resource('machine_types', 'Machine_typesController');
Route::resource('machines', 'MachinesController');
Route::resource('trucks', 'TrucksController');
Route::resource('contacts', 'ContactsController');
Route::resource('reminders', 'RemindersController');
Route::resource('memos', 'MemosController');
Route::resource('production_logs', 'Production_logsController');
Route::resource('clients', 'ClientsController');
Route::resource('products', 'ProductsController');
Route::resource('units', 'UnitsController');
Route::resource('purchase_orders', 'Purchase_ordersController');
Route::resource('recieving_reports', 'Recieving_reportsController');
Route::resource('sales_orders', 'Sales_ordersController');
Route::resource('production_queues', 'Production_queuesController');
Route::resource('production_records', 'Production_recordsController');
Route::resource('delivery_queues', 'Delivery_queuesController');
Route::resource('terms', 'TermsController');



Route::controller('purchasing', 'Purchasing');
Route::controller('sales', 'Sales');
Route::controller('production', 'Production');
Route::controller('delivery', 'Delivery');