@extends('admin.master')

@section('title')
    Dashboard
 @endsection
 
@section('pagetitle')
    <h3 class="page-title">Dashboard</h3>

    <ul class="breadcrumb">         
        <li>
		    <i class="icon-home"></i>
            <a href="{{asset('employee/work_dashboard')}}">Dashboard</a>
        </li>
    </ul>
@endsection

@section('content') 
    <div class="box box-primary col-md-12" style="overflow:scroll;height:300px" >
    	                 
		   <div class="box-body" >		
			@if( ! empty($arrData))
             <table id="dtWork" class="table table-bordered dataTable" > 		
                <thead>
                <tr>					
                    <th>Client</th>
					<th>Work</th>
                    <th>Start Date</th>
                    <th>End Date</th>					
                    <th>Status</th>                                     
                </tr>
                </thead>
                <tbody>				
					@foreach($arrData as $item)
					    <tr>							
							<td>{{ $item->name }}</td>						  
							<td>{{ $item->work }}</td>						   
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->start_date)->format('d/m/Y') }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->end_date)->format('d/m/Y') }}</td>				  										
							<td>{{ $item->status }}</td>							
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
    </script>    
@endsection