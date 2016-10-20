<?php namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;
use DB;
use View;
use Model;
use DateTime;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\AssignWorkRequest;

class WorkController extends Controller {

/**
* Show the application welcome screen to the user.
*
* @return Response
*/  
	//method to fill dropdowns of employee and work
	public function CreateWorkList(){
		$clients = DB::table('client')->orderBy('name', 'asc')->lists('name','id');
	    $employees = DB::table('employees')->orderBy('name', 'asc')->lists('name','id');
		$work = DB::table('work_master')->orderBy('work', 'asc')->lists('work','id');
		// $arrData = DB::table('assign_work')->with('client','employee','work')->get();		
		$arrData = DB::table('assign_work')
					 ->join('client','assign_work.client_id', '=', 'client.id')
					 ->join('employees','assign_work.employee_id', '=', 'employees.id')
					 ->join('work_master','assign_work.work_id', '=', 'work_master.id')
					 ->select('client.name','work_master.work','assign_work.start_date','assign_work.end_date','employees.name AS emp_name','assign_work.status')
					 ->orderBy('assign_work.status')
					 ->get(); 
		return view('admin.work.assign_work', compact(['clients','employees','work','arrData']));
	}
	
	//assign work of client to particular employee
	public function AssignWork(AssignWorkRequest $request)
    {	
		if(isset($_POST['submit'])){			   
			  $work = new \App\Model\Assign_work();
			  $work->client_id = $request->input('client_id');
			  $work->employee_id = $request->input('employee_id');
			  $work->work_id = $request->input('work_id');
			  
			  $start_date = $request->input('start_date');
			  $work->start_date =  DateTime::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
			  
			  $end_date = $request->input('end_date');
			  $work->end_date  =  DateTime::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');
			  
			  $work->status = 'Assigned';			  
			  $work->save();
		   }   
		return $this->CreateWorkList();
    }
	
	//get list of completed work by all employees
	public function GetCompletedWorkList(){	        				 
	    //get work list of InProgress tasks
		$arrData = DB::table('assign_work')
					 ->join('client','assign_work.client_id', '=', 'client.id')	
					 ->join('employees','assign_work.employee_id', '=', 'employees.id')	
					 ->join('work_master','assign_work.work_id', '=', 'work_master.id')
					 ->select('assign_work.id','client.name','work_master.work','assign_work.start_date','assign_work.end_date','employees.name AS emp_name','assign_work.status')					
					 ->where('assign_work.status','Completed')
					 ->orderBy('assign_work.start_date','assign_work.end_date')
					 ->get(); 
					 
		return view('admin.work.verify_work', compact('arrData'));
	}
	
	//update work status from Completed to Closed of completed tasks
	public function UpdateTaskStatus($id)
    {
		if(isset($_POST['verify'])){			  			
				  DB::table('assign_work')
					 ->where('id', $id)
					 ->update(['status' => 'Closed']);		       			   
	    } 	
		
		 return $this->GetCompletedWorkList();
     }	
	
}

?>