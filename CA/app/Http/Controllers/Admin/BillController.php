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

class BillController extends Controller {

/**
* Show the application welcome screen to the user.
*
* @return Response
*/  
	
	//get list of completed work by all employees
	public function GetClosedWorkList(){	        				 
	    //get work list of InProgress tasks
		$arrData = DB::table('assign_work')
					 ->join('client','assign_work.client_id', '=', 'client.id')	
					 ->join('employees','assign_work.employee_id', '=', 'employees.id')	
					 ->join('work_master','assign_work.work_id', '=', 'work_master.id')
					 ->select('assign_work.id','client.name','work_master.work','assign_work.start_date','assign_work.end_date','employees.name AS emp_name','assign_work.status')					
					 ->where('assign_work.status','Closed')
					 ->orderBy('assign_work.start_date','assign_work.end_date')
					 ->get(); 
					 
		return view('admin.bill.pending_bills', compact('arrData'));
	}
	
	// //update work status from Completed to Closed of completed tasks
	// public function UpdateTaskStatus($id)
    // {
		// if(isset($_POST['verify'])){			  			
				  // DB::table('assign_work')
					 // ->where('id', $id)
					 // ->update(['status' => 'Closed']);		       			   
	    // } 	
		
		 // return $this->GetCompletedWorkList();
     // }	
	
}

?>