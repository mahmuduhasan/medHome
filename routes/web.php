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

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/product/{id}','UserController@singleProduct')->name('user.product');
Route::get('/offer','UserController@offer');
//Product
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/product','AdminController@allcontent');
Route::get('/admin/addproduct','AdminController@viewProduct');
Route::post('/admin/addproduct','AdminController@addProduct')->name('product.add');
Route::get('/admin/delete/{id}','AdminController@deleteProduct')->name('product.delete');
Route::get('/admin/product/update/{id}','AdminController@showUpdateProduct');
Route::post('/admin/product/update','AdminController@updateProduct')->name('product.update');
Route::get('/admin/product/search','AdminController@productSearch')->name('product.search');
Route::get('/admin/agent/search','AdminController@agentSearch')->name('agent.search');
Route::get('/admin/employee/search','AdminController@employeeSearch')->name('employee.search');
Route::get('/admin/offer','Admincontroller@offer');
Route::get('/admin/addoffer','AdminController@uploadOffer');
Route::post('/admin/adoffer','AdminController@upload')->name('offer.upload');
Route::get('/admin/delete/offer/{id}','AdminController@deleteOffer');
//Customer
Route::get('/admin/customer','CustomerController@index');
Route::post('/order','CustomerController@create')->name('customer.order');
Route::delete('/order/delete/{id}','CustomerController@deleteCustomer')->name('order.deleted');
//Agent Route
Route::get('/admin/agent','AdminController@allagent');
Route::get('/admin/addagent','AdminController@viewAgent');
Route::post('/admin/addagent','AdminController@addAgent')->name('agent.add');
Route::get('/admin/agent/delete/{id}','AdminController@deleteAgent')->name('agent.delete');
Route::get('/admin/agent/update/{id}','AdminController@showUpdateAgent');
Route::post('/admin/agent/update','AdminController@updateAgent')->name('agent.update');
//Employee Route
Route::get('/admin/employee','AdminController@allemployee');
Route::get('/admin/addemployee','AdminController@viewEmployee');
Route::post('/admin/addemployee','AdminController@addEmployee')->name('employee.add');
Route::get('/admin/employee/delete/{id}','AdminController@deleteEmployee')->name('employee.delete');
Route::get('/admin/employee/update/{id}','AdminController@showUpdateEmployee');
Route::post('/admin/employee/update','AdminController@updateEmployee')->name('employee.update');
//Request
Route::get('/admin/request','AdminController@showRequest');
Route::post('/admin/request/approve/{id}','AdminController@approve')->name('agent.approved');
Route::get('/agent/request/{email}','AdminController@deleteAgentFromAdmin');
//Report
Route::get('/admin/agent/report','AdminController@getReport');
Route::get('/downloadpdf','AdminController@downloadReportPDF');
Route::get('/downloadexcel','AdminController@exportReportEXCEL');
Route::get('/downloadcsv','AdminController@exportReportCSV');
//Notice
Route::get('/notice/index','NoticeController@index');
Route::post('/notice/index','NoticeController@upload')->name('notice.upload');
Route::get('/notices','NoticeController@shownotice');
Route::get('/notice/delete/{id}','NoticeController@deletenotice');
Route::get('/notice/view/{id}','NoticeController@viewNotice');
Route::get('/notice/download/{file}','NoticeController@downloadNotice');


Route::get('/agent', 'AgentController@index')->name('agent');
Route::get('/agent/addproduct','AgentController@showProductForm');
Route::post('/agent/addproduct','AgentController@addProductByAgent')->name('product.addedbyagent');
Route::get('/agent/report','AgentController@reportView');
Route::post('/agent/report','AgentController@storeReport')->name('report.submitted');


Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::get('/employee/agent/{id}','EmployeeController@viewAgent')->name('agent.underemployee');
Route::get('/employee/addagent','EmployeeController@addAgentView');
Route::post('/employee/addagent','EmployeeController@addAgent')->name('agent.added');
Route::get('/employee/notices','EmployeeController@shownotice');
Route::get('/employee/notice/view/{id}','EmployeeController@viewNotice');
Route::get('/employee/notice/download/{file}','NoticeController@downloadNotice');

Auth::routes();



