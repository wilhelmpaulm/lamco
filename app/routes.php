<?php

Route::get('/', function()
{
	return View::make('hello');
});


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

Route::resource('delivery_queueas', 'Delivery_queueasController');

Route::resource('terms', 'TermsController');

Route::resource('units', 'UnitsController');