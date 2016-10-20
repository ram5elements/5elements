<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('welcome', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/*.....Login Panel.....*/
Route::get('/', 'LoginController@login');
Route::post('login', 'LoginController@checklogin');
Route::get('user/logout', 'LoginController@user_logout');

/*.....Admin Portal Menu....*/
Route::get('admin/dashboard', 'AdminController@Dashboard');
/*.....-------Party List Portal Menu------------------....*/
Route::get('admin/add_party', 'AdminController@Party');
Route::post('admin/add_new_party', 'AdminController@Add_Party');
Route::get('admin/view_party', 'AdminController@Party_List');
/*.....-------Party List Portal Menu------------------....*/
Route::get('admin/add_mines', 'AdminController@Mines');
Route::post('admin/add_new_mines', 'AdminController@Add_Mines');
Route::get('admin/view_mines', 'AdminController@Mines_List');
Route::get('admin/add_liftner', 'AdminController@Add_liftner');
Route::post('admin/add_new_liftner', 'AdminController@Add_new_liftner');
Route::get('admin/view_liftner', 'AdminController@View_liftner');
Route::get('admin/create_user', 'AdminController@User');
Route::post('admin/add_new_user', 'AdminController@Create_New_User');
Route::get('admin/view_user', 'AdminController@User_List');
Route::get('admin/view_purchase', 'AdminController@View_Purchase');
Route::get('admin/view_stock', 'AdminController@View_Stock');
Route::get('admin/view_sales', 'AdminController@View_Sales');
Route::get('admin/view_payments', 'AdminController@View_Payments');
Route::get('admin/report_section', 'AdminController@Report_Section');
Route::get('admin/add_product', 'AdminController@Add_Product');
Route::get('admin/add_product_item', 'AdminController@Add_Product_item');
Route::post('product/add', 'AdminController@Product_Add');
Route::get('admin/product_list', 'AdminController@View_Product');
/*---------------------------Dinesh/Work in Party Details-------------------*/
Route::get('admin/add_dinesh','AdminController@Dinesh');
Route::post('admin/add_new_dinesh','AdminController@Add_Dinesh');
Route::get('admin/view_dinesh','AdminController@Dinesh_List');
/*---------------------------Dinesh/Work in Party Details-------------------*/
Route::get('admin/add_coal','AdminController@Add_coal');
Route::get('admin/mines1','AdminController@Add_Mines1');
Route::post('admin/addmines','AdminController@AddNewMines');
/*---------------------------Dinesh/Work in Party Details-------------------*/

Route::get('admin/add_dinesh_Minesh','AdminController@Add_Dinesh_Mines');
Route::post('admin/add_dinesh_New_Minesh','AdminController@Add_Dinesh_New_Minesh');

/*.....Sub_user Portal Menu....*/
Route::get('user/dashboard', 'UserController@dashboard');
Route::get('user/insert_delivery', 'UserController@Insert_Delivery');
Route::get('user/view_delivery', 'UserController@View_Delivery');
Route::get('user/stock_details', 'UserController@Stock_Detail');

Route::get('user/purchase_order', 'UserController@Purchase_Order');
Route::post('user/PO_Entry', 'UserController@PO_Entry');
Route::get('user/view_sales', 'UserController@View_Sales');
Route::get('user/outward_entry', 'UserController@OutWard_entry');
Route::get('get/PO_Data', 'UserController@Get_PO_Data');
//outward entry
Route::post('user/outward','UserController@OutWard_entry');
Route::post('user/Outward_submit','UserController@Outward_submit');

Route::get('user/view_DO_Payment', 'UserController@View_DO_Payment');
Route::get('user/DO_Payment', 'UserController@DO_Payment');
Route::post('user/DO_Payment_insert', 'UserController@DO_Payment_insert');
Route::get('user/view_PO_Payment', 'UserController@View_PO_Payment');
Route::get('user/PO_Payment', 'UserController@PO_Payment');
Route::get('get/receipt_Data', 'UserController@Gat_Receipt_Data');
Route::get('user/report_section', 'UserController@Report_Section');
Route::get('get/product_list', 'UserController@Gat_Product_list');
Route::get('user/inward_entry', 'UserController@InWard_entry');
Route::get('get/DO_Data', 'UserController@Gat_DO_Data');
Route::post('user/DO_Entry', 'UserController@DO_Entry');
Route::post('user/Inward_submit', 'UserController@Inward_submit');
//Route::post('user/Add_Payment_insert', 'UserController@AddPaymentSubmit');//ny routes for print add payment

/*---------------------------Out Word Part---------------------------------*/

Route::post('user/out_word_submit','UserController@Out_Word_Submit');
Route::get('user/outward_entry_check','UserController@OutWard_entry_checkdp');
/*---------------------------Out Word endPart---------------------------------*/

/*----------    Show The values---------------------------------------*/
Route::get('user/InWard_Party_Entry','UserController@InWard_PartyEntry');
Route::post('user/InWard_Party_Entry','UserController@InWardPartyEntrySubmit');

Route::get('user/inward_entry_check','UserController@Invard_Check');

/*------------------Demo------------------------------------------*/
Route::get('user/demo','UserController@Demo');
Route::post('user/demo_insert','UserController@Demo_Insert');
/*------------------Demo------------------------------------------*/
Route::get('user/supriya','UserController@Demo');
Route::post('user/demo_insert','UserController@Demo_Insert');
Route::get('insert','StudInsertController@insertform');
Route::post('create','StudInsertController@insert');
Route::get('user/supriya','UserController@Demo');
Route::get('user/Add_payment','UserController@Demo_Section');
Route::post('user/AddPaymentSubmit','UserController@AddPaymentSubmit');
Route::get('user/Add_payment','UserController@select_party');
