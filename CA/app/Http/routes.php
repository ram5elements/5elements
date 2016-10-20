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

/*routes for login and logout */
Route::group(['middlewareGroups' => ['web']], function() {
	Route::get('/', 'Auth\AuthController@getLogin');
	Route::post('auth/login','Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@logout');
});

/*routes for admin dashboard*/
Route::group(['middlewareGroups' => ['web'], 'namespace' => 'Admin'], function() {
 
    //if user is Admin, show Dashboard page
	//else, redirect to login page 
	// Route::get('admin/dashboard','AdminController@Dashboard');
		 Route::get('admin/dashboard', function () {
		    $roleable = new App\Roleable(); 
            if ($roleable->hasRole(1)) {
				 // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Admin\AdminController');
				return $controller->callAction('Dashboard', $parameters = array());               
            }
		   else{
			  return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');			  					
		   }	
      });	   
});

/*routes for admin/work*/
Route::group(['middlewareGroups' => ['web'], 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
	 //if user is Admin, show Assign Work page
	   //else, redirect to login page
	      Route::get('/work/assign_work', function () {
		    $roleable = new App\Roleable(); 
            if ($roleable->hasRole(1)) {
				 // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Admin\WorkController');
				return $controller->callAction('CreateWorkList', $parameters = array());               
            }
		   else{
			  return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');			  					
		   }
		
      });	 

     Route::post('/work/assign_work','WorkController@AssignWork');	 
	 
	 //if user is Admin, show Verify Work page
	   //else, redirect to login page
	   Route::get('/work/verify_work', function () {
		  $roleable = new App\Roleable(); 
          if ($roleable->hasRole(1)) {
			   // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Admin\WorkController');
				return $controller->callAction('GetCompletedWorkList', $parameters = array());            
          }
		  else{
			  return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');
		 }
		
      });
	  
	   Route::post('/work/verify_work/{id}','WorkController@UpdateTaskStatus'); 
	
});

/*routes for admin/work*/
Route::group(['middlewareGroups' => ['web'], 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
	 Route::get('/bill/pending_bills','BillController@GetClosedWorkList'); 
});

/*routes for admin/registration*/
 Route::group(['middlewareGroups' => ['web'], 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
         
	   //if user is Admin, show Client Registration page
	   //else, redirect to login page
	    Route::get('/registration/add_client', function () {
		   $roleable = new App\Roleable(); 
           if ($roleable->hasRole(1)) {
			    // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Admin\RegistrationController');
				return $controller->callAction('AddClient', $parameters = array());             
           }
		   else{
			   return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');
		   }
		
      });	
	
       Route::post('/registration/add_client','RegistrationController@SaveClient');
	   Route::get('/registration/work_master', 'RegistrationController@GetWorkMaster');
	   Route::post('/registration/work_master','RegistrationController@SaveWorkMaster');	
	   
	    //if user is Admin, show Employee Registration page
	   //else, redirect to login page
	   Route::get('/registration/add_employee', function () {
		  $roleable = new App\Roleable(); 
          if ($roleable->hasRole(1)) {
			   // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Admin\RegistrationController');
				return $controller->callAction('AddEmployee', $parameters = array());             
          }
		  else{
			  return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');
		 }
		
      });	 
	  
      Route::post('/registration/add_employee','RegistrationController@SaveEmployee');
   });
   
   /*routes for employee*/
 Route::group(['middlewareGroups' => ['web'], 'namespace' => 'Employee'], function() {
	 
	  //if user is Employee, show Work List page
	   //else, redirect to login page
	   Route::get('employee/work_list', function () {
		  $roleable = new App\Roleable(); 
          if ($roleable->hasRole(3)) {
			   // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Employee\EmployeeController');
				return $controller->callAction('GetWorkList', $parameters = array());            
          }
		  else{
			  return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');
		 }
		
      });
	  
	   Route::post('/employee/work_list/{id}','EmployeeController@UpdateWorkStatus'); 
	   
	   //if user is Employee, show Work Dashboard page
	   //else, redirect to login page
	   Route::get('employee/work_dashboard', function () {
		  $roleable = new App\Roleable(); 
          if ($roleable->hasRole(3)) {
			   // Run controller and method
				$app = app();
				$controller = $app->make('App\Http\Controllers\Employee\EmployeeController');
				return $controller->callAction('GetWorkDashboard', $parameters = array());            
          }
		  else{
			  return view('auth/login')->withErrors('You are not allowed to access this page. Please login with valid credentials.');
		 }
		
      });
 });	 

   
   