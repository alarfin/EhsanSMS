<?php

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
Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['middleware' => ['auth']], function()
{
	//Profile Routes
	Route::get('/profile', 'ProfileController@profile')->name('profile');
	Route::get('/profile_edit/{id}', 'ProfileController@profile_edit')->name('profile_edit');
	Route::post('/profile_update/{id}', 'ProfileController@profile_update')->name('profile_update');
	Route::get('/password_update', 'ProfileController@password_update')->name('password_update');
	Route::post('/password_store/{id}', 'ProfileController@password_store')->name('password_store');

	//Send SMS Routs
	Route::get('/single_sms', 'SmsController@single_sms')->name('single_sms');
	Route::get('/send_multi_sms', 'SmsController@send_multi_sms')->name('send_multi_sms');
	Route::get('/get_group_number', 'SmsController@get_group_number')->name('get_group_number');
	Route::post('/get_group_number', 'SmsController@get_group_number')->name('get_group_number');
	Route::get('/send_group_sms', 'SmsController@send_group_sms')->name('send_group_sms');
	Route::post('/send_sms', 'SmsController@send_sms')->name('send_sms');
	Route::get('/report_list', 'SmsController@report_list')->name('report_list');
	Route::get('/month_report_list', 'SmsController@month_report_list')->name('month_report_list');

	//Phonebook Group Routs
	Route::get('/phonebook_group_add', 'PhonebookGroupController@phonebook_group_add')->name('phonebook_group_add');
	Route::post('/phonebook_group_store', 'PhonebookGroupController@phonebook_group_store')->name('phonebook_group_store');
	Route::get('/phonebook_group_list', 'PhonebookGroupController@phonebook_group_list')->name('phonebook_group_list');
	Route::get('/phonebook_group_edit/{id}', 'PhonebookGroupController@phonebook_group_edit')->name('phonebook_group_edit');
	Route::post('/phonebook_group_update/{id}', 'PhonebookGroupController@phonebook_group_update')->name('phonebook_group_update');
	Route::get('/phonebook_group_enable/{id}', 'PhonebookGroupController@phonebook_group_enable')->name('phonebook_group_enable');
	Route::get('/phonebook_group_disable/{id}', 'PhonebookGroupController@phonebook_group_disable')->name('phonebook_group_disable');
	Route::get('/phonebook_group_delete/{id}', 'PhonebookGroupController@phonebook_group_delete')->name('phonebook_group_delete');

	//Phonebook Routs
	Route::get('/phonebook_add', 'PhonebookController@phonebook_add')->name('phonebook_add');
	Route::post('/phonebook_store', 'PhonebookController@phonebook_store')->name('phonebook_store');
	Route::get('/phonebook_import', 'PhonebookController@phonebook_import')->name('phonebook_import');
	Route::post('/phonebook_import_store', 'PhonebookController@phonebook_import_store')->name('phonebook_import_store');
	Route::get('/phonebook_list', 'PhonebookController@phonebook_list')->name('phonebook_list');
	Route::get('/phonebook_blocked_list', 'PhonebookController@phonebook_blocked_list')->name('phonebook_blocked_list');
	Route::get('/phonebook_edit/{id}', 'PhonebookController@phonebook_edit')->name('phonebook_edit');
	Route::post('/phonebook_update/{id}', 'PhonebookController@phonebook_update')->name('phonebook_update');
	Route::get('/phonebook_enable/{id}', 'PhonebookController@phonebook_enable')->name('phonebook_enable');
	Route::get('/phonebook_disable/{id}', 'PhonebookController@phonebook_disable')->name('phonebook_disable');
	Route::get('/phonebook_delete/{id}', 'PhonebookController@phonebook_delete')->name('phonebook_delete');


	//Phonebook Routs
	Route::get('/recharge', 'BalanceController@recharge')->name('recharge');
	Route::post('/balance_store', 'BalanceController@balance_store')->name('balance_store');
	Route::get('/balance', 'BalanceController@balance')->name('balance');
	Route::get('/recharge_history', 'BalanceController@recharge_history')->name('recharge_history');
	Route::get('/recharge_docs', 'BalanceController@recharge_docs')->name('recharge_docs');

	//Developer Zone Routs
	Route::get('/api_sender_id', 'DeveloperController@api_sender_id')->name('api_sender_id');
	Route::get('/api_docs', 'DeveloperController@api_docs')->name('api_docs');

	Route::group(['middleware' => ['admin']], function()
	{
		Route::get('/', 'AdminController@home')->name('home');
		Route::get('/home', 'AdminController@home')->name('home');

		//Client Routs
		Route::get('/client_add', 'ClientController@client_add')->name('client_add');
		Route::post('/client_store', 'ClientController@client_store')->name('client_store');
		Route::get('/client_list', 'ClientController@client_list')->name('client_list');
		Route::get('/client_edit/{id}', 'ClientController@client_edit')->name('client_edit');
		Route::post('/client_update/{id}', 'ClientController@client_update')->name('client_update');
		Route::get('/client_enable/{id}', 'ClientController@client_enable')->name('client_enable');
		Route::get('/client_disable/{id}', 'ClientController@client_disable')->name('client_disable');
		Route::get('/client_delete/{id}', 'ClientController@client_delete')->name('client_delete');

		//Service Status Routs
		Route::get('/service_status_add', 'ServiceStatusController@service_status_add')->name('service_status_add');
		Route::post('/service_status_store', 'ServiceStatusController@service_status_store')->name('service_status_store');
		Route::post('/service_status_update', 'ServiceStatusController@service_status_update')->name('service_status_update');

		// Only Admin Send SMS Route
		Route::get('/post_method_sms', 'SmsController@post_method_sms')->name('post_method_sms');

		// Reacharge by Admin
		Route::get('/recharge_admin', 'BalanceController@recharge_admin')->name('recharge_admin');
		Route::post('/recharge_admin_store', 'BalanceController@recharge_admin_store')->name('recharge_admin_store');
		Route::get('/all_recharge_history', 'BalanceController@all_recharge_history')->name('all_recharge_history');
		Route::get('/recharge_edit/{id}', 'BalanceController@recharge_edit')->name('recharge_edit');
		Route::post('/recharge_update/{id}', 'BalanceController@recharge_update')->name('recharge_update');

		// Direct SMS by Admin
		Route::get('/direct_sms_admin', 'DirectSmsController@direct_sms_admin')->name('direct_sms_admin');
		Route::post('/direct_sms_admin_store', 'DirectSmsController@direct_sms_admin_store')->name('direct_sms_admin_store');
		Route::get('/direct_sms_admin_list', 'DirectSmsController@direct_sms_admin_list')->name('direct_sms_admin_list');
		Route::get('/direct_sms_admin_edit/{id}', 'DirectSmsController@direct_sms_admin_edit')->name('direct_sms_admin_edit');
		Route::post('/direct_sms_admin_update/{id}', 'DirectSmsController@direct_sms_admin_update')->name('direct_sms_admin_update');
		Route::get('/direct_sms_admin_delete/{id}', 'DirectSmsController@direct_sms_admin_delete')->name('direct_sms_admin_delete');

		// SMS Sender by Admin
		Route::get('/sms_sender', 'SmsSenderController@sms_sender')->name('sms_sender');
		Route::post('/sms_sender_store', 'SmsSenderController@sms_sender_store')->name('sms_sender_store');
		Route::get('/sms_sender_list', 'SmsSenderController@sms_sender_list')->name('sms_sender_list');
		Route::post('/sms_sender_update/{id}', 'SmsSenderController@sms_sender_update')->name('sms_sender_update');



	});
	Route::group(['middleware' => ['client']], function()
	{
		Route::get('client', 'AdminController@client')->name('client');

	});

});
Route::get('admin_create', 'ClientController@admin_create')->name('admin_create');
