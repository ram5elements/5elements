@extends('admin.master')

@section('title')
    Assigned Work List
 @endsection
 
@section('pagetitle')
    <h3 class="page-title">Assigned Work List</h3>

    <ul class="breadcrumb">        
        <li>
			<i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{asset('employee/work_list')}}">Assigned Work List</a>
        </li>
    </ul>
@endsection

@section('content') 

    <!--Shows Assigned tasks to be accepted/rejected  -->
	<h4><b>Assigned tasks:</b></h4>
    <div class="box box-primary col-md-12" style="overflow:scroll;height:200px" >
    	                 
		   <div class="box-body" >		
			@if( ! empty($arrData))
             <table id="dtWork" class="table table-bordered dataTable" > 		
                <thead>
                <tr>					
                    <th>Client</th>
					<th>Work</th>
                    <th>Start Date</th>
                    <th>End Date</th>					
                    <th>Accept</th>
                    <th>Reject</th>                    
                </tr>
                </thead>
                <tbody>				
					@foreach($arrData as $item)
					    <tr>							
							<td>
								<input type="hidden" name="id[]" value="{{$item->id}}">
								{{ $item->name }}
							</td>						  
							<td>{{ $item->work }}</td>						   
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->start_date)->format('d/m/Y') }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->end_date)->format('d/m/Y') }}</td>				  										
							
						    <td>
								 <form action="{{ url('employee/work_list/'.$item->id) }}" method="POST">
									 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
									 <button type="submit" id="accept-task-{{ $item->id }}" name="accept" class="btn btn-primary btn-xs" >Accept</button>
								</form>
						    </td>
						
						     <td>
								 <form action="{{ url('employee/work_list/'.$item->id) }}" method="POST">
									 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
									 <button type="submit" id="reject-task-{{ $item->id }}" name="reject" class="btn btn-primary btn-xs" >Reject</button>
								</form>
						    </td>
							
						</tr>
					@endforeach
                </tbody>
             </table>
			@else
			  <table id="dtWork" class="table table-bordered dataTable" > 
				<tbody>No records found</tbody>				
			  </table>
			@endif
           </div>		  
    </div>  

	
	<!-- Shows InProgress tasks to be completed -->
	<h4><b>Tasks to be completed:</b></h4>
	  <div class="box box-primary col-md-12" style="overflow:scroll;height:200px" >
    	                 
		   <div class="box-body" >		
			@if( ! empty($arrWorkData))
             <table id="dtAssignedWork" class="table table-bordered dataTable" > 		
                <thead>
                <tr>					
                    <th>Client</th>
					<th>Work</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>					
                    <th>Finish</th>                                       
                </tr>
                </thead>
                <tbody>				
					@foreach($arrWorkData as $item)
					    <tr>							
							<td>
								<input type="hidden" name="id[]" value="{{$item->id}}">
								{{ $item->name }}
							</td>						  
							<td>{{ $item->work }}</td>						   
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->start_date)->format('d/m/Y') }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->end_date)->format('d/m/Y') }}</td>				  										
							<td>{{ $item->status }}</td>
						    <td>
								 <form action="{{ url('employee/work_list/'.$item->id) }}" method="POST">
									 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
									 <button type="submit" id="finish-task-{{ $item->id }}" name="finish" class="btn btn-primary btn-xs" >Finish</button>
								</form>
						    </td>						    
						</tr>
					@endforeach
                </tbody>
             </table>
			@else
			  <table id="dtWork" class="table table-bordered dataTable" > 
				<tbody>No records found</tbody>				
			  </table>
			@endif
           </div>		  
    </div>  
 
@endsection

@section('javascript')
    <script>
         $("#dtWork").DataTable(); 
		 $("#dtAssignedWork").DataTable();	
    </script>    
@endsection