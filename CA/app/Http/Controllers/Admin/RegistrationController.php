<?php namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Model;
use Carbon\Carbon;
use DateTime;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ClientRequest;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Http\Requests\Admin\WorkMasterRequest;

class RegistrationController extends Controller {

    /*methods to get and save work_master*/
    public function GetWorkMaster()
	{		
		$arrData = DB::table('work_master')->get();		
		return view('admin.registration.work_master')->with('data',$arrData);		
	}
	
	public function SaveWorkMaster(WorkMasterRequest $request)
	{
		if(isset($_POST['submit'])){
			   $work_master = new \App\Model\Work_master();
			   $id  = $_POST['id'];	
			   $due_days = $_POST['due_days'];			  	
			   $fees = $_POST['fees'];			   
		       foreach( $id as $key => $n ) { 
				$due_date = $request->input('due_date')[$key];				
                $format_due_date = DateTime::createFromFormat('d/m/Y', $due_date)->format('Y-m-d');					
				
				DB::table('work_master')
					->where('id', $id[$key])
					->update(['fees' => $fees[$key], 'due_days' => $due_days[$key],'due_date'=>$format_due_date]);			
		       } 
              			   
		}	
		$arrData = DB::table('work_master')->get();
	    return view('admin.registration.work_master')->with('data',$arrData);		
	}
	
	 /*methods to get and save new client*/
	public  function AddClient()
    {
		
        return view('admin.registration.add_client');
    }

    public function SaveClient(ClientRequest $request)
    {
		if(isset($_POST['submit'])){			   
			  $client = new \App\Client();
			  $client->name = $_POST['name'];
			  $client->address = $_POST['address'];
			  $client->contact_person = $_POST['contact_person'];
			  $client->mobile_number = $_POST['mobile_number'];
			  $client->email_id = $_POST['email_id'];
			  $client->status = $_POST['status'];
			  $client->PAN = $_POST['PAN'];
			  $client->TAN = $_POST['TAN'];
			  $client->TIN = $_POST['TIN'];
			  $client->CIN = $_POST['CIN'];
			  $client->excise_reg_no = $_POST['excise_reg_no'];
			  $client->service_tax_reg_no = $_POST['service_tax_reg_no'];
			  $client->save();			 
			
			 $client->roleable()->attach($client->id,['role_id'=>2]);			
			 Session::flash('client_message', 'New Client Added');
		   }        
       return view('admin.registration.add_client');
    }
	
	/*methods to get and save new employee*/
	public  function AddEmployee()
    {		
        return view('admin.registration.add_employee');
    }  
	
	public function SaveEmployee(EmployeeRequest $request)
	 {
		if(isset($_POST['submit'])){
			   $employee = new \App\Employee();
			   $employee->name = $_POST['name'];
			   $employee->father_name = $_POST['father_name'];
			   $employee->address = $_POST['address'];
			   $employee->mobile_number = $_POST['mobile_number'];
			   $employee->email_id = $_POST['email_id'];
			   //$employee->password = bcrypt($_POST['password']);
			   $employee->password = Hash::make($_POST['password']);
			   $employee->save();			  
			  
			   $employee->roleables()->attach($employee->id,['role_id'=>3]);
						 		
			 Session::flash('employee_message', 'New Employee Added');
		}
		return view('admin.registration.add_employee');
	}	
	
}

?>