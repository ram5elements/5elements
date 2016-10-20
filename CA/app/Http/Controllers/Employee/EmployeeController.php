<?php namespace App\Http\Controllers;

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Session;
use DB;
use View;
use Model;
use DateTime;
use Auth;
use Illuminate\Support\Facades\Input;


class EmployeeController extends Controller {

/**
* Show the application welcome screen to the user.
*
* @return Response
*/
  
	//method to get assigned work list of logged-in employee
	public function GetWorkList(){
		// $arrData = DB::table('assign_work')->with('client','employee','work')->get();	
        	$roleable = new \App\Roleable(); 
            $emp_id = $roleable->getLoggedInUserId();
			
		$arrData = DB::table('assign_work')
					 ->join('client','assign_work.client_id', '=', 'client.id')					 
					 ->join('work_master','assign_work.work_id', '=', 'work_master.id')
					 ->select('assign_work.id','client.name','work_master.work','assign_work.start_date','assign_work.end_date')
					 ->where('assign_work.employee_id',$emp_id)
					 ->where('assign_work.status','Assigned')
					 ->orderBy('assign_work.start_date','assign_work.end_date')
					 ->get(); 
					 
	    //get work list of InProgress tasks
		$arrWorkData = DB::table('assign_work')
					 ->join('client','assign_work.client_id', '=', 'client.id')					 
					 ->join('work_master','assign_work.work_id', '=', 'work_master.id')
					 ->select('assign_work.id','client.name','work_master.work','assign_work.start_date','assign_work.end_date','assign_work.status')
					 ->where('assign_work.employee_id',$emp_id)
					 ->where('assign_work.status','In Progress')
					 ->orderBy('assign_work.start_date','assign_work.end_date')
					 ->get(); 
					 
		return view('employee.work_list', compact(['arrData','arrWorkData']));
	}
	
	//update work status if employee accepts/rejects/finishes the task
	public function UpdateWorkStatus($id)
    {	
		if(isset($_POST['accept'])){			 				
				  DB::table('assign_work')
					 ->where('id', $id)
					 ->update(['status' => 'In Progress']);				     		   
	    } 

		if(isset($_POST['reject'])){			  			
				  DB::table('assign_work')
					 ->where('id', $id)
					 ->update(['status' => 'Open']);		       			   
	    } 	

		if(isset($_POST['finish'])){			  			
				  DB::table('assign_work')
					 ->where('id', $id)
					 ->update(['status' => 'Completed']);		       			   
	    } 	
		
		 return $this->GetWorkList();
     }
	 
	 //get work dashboard of logged-in employee
	public function GetWorkDashboard(){		
        	$roleable = new \App\Roleable(); 
            $emp_id = $roleable->getLoggedInUserId();
			
		$arrData = DB::table('assign_work')
					 ->join('client','assign_work.client_id', '=', 'client.id')					 
					 ->join('work_master','assign_work.work_id', '=', 'work_master.id')
					 ->select('client.name','work_master.work','assign_work.start_date','assign_work.end_date','assign_work.status')
					 ->where('assign_work.employee_id',$emp_id)	
					 ->where('assign_work.status','!=','Open')
					 ->orderBy('assign_work.status')
					 ->get(); 
		return view('employee.work_dashboard', compact('arrData'));
	}
	
	
}

?>