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

class AdminController extends Controller {

/**
* Show the application welcome screen to the user.
*
* @return Response
*/

    public function Dashboard()
    {	
        $total_assignments = DB::table('assign_work')->count();
		$pending_assignments = DB::table('assign_work')->where('status','!=','Completed')->count();
		$pending_bills = DB::table('assign_work')->where('status','Closed')->count();
		$total_clients = DB::table('client')->count();
		$clients = DB::table('client')->get();
		$employees = DB::table('employees')->get();
		
		$now = new DateTime();
		$now->add(new \DateInterval('P7D'));
		$upcoming_duedate = $now->format('Y-m-d');	
        $work_master = DB::table('work_master')->orderBy('due_date')->get();		
       	
        return view('admin.dashboard',compact(['total_assignments','pending_assignments','pending_bills','total_clients','clients','employees','upcoming_duedate','work_master']));
    } 	
	
}

?>