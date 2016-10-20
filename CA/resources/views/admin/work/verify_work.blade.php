@extends('admin.master')

@section('title')
    Verify Work
 @endsection
 
@section('pagetitle')
    <h3 class="page-title">Verify Work</h3>

   <ul class="breadcrumb">        
        <li>
			<i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{asset('admin/work/verify_work')}}">Verify Work</a>
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
					<th>Employee</th>
                    <th>Status</th> 
					<th>Verify & Close</th>
                </tr>
                </thead>
                <tbody>				
					@foreach($arrData as $item)
					    <tr>							
							<td>{{ $item->name }}</td>						  
							<td>{{ $item->work }}</td>						   
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->start_date)->format('d/m/Y') }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->end_date)->format('d/m/Y') }}</td>				  										
							<td>{{ $item->emp_name }}</td>	
							<td>{{ $item->status }}</td>

							<td>
								 <form action="{{ url('admin/work/verify_work/'.$item->id) }}" method="POST">
									 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
									 <button type="submit" id="verify-task-{{ $item->id }}" name="verify" class="btn btn-primary btn-xs" >Verify & Close</button>
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
    </script>    
@endsection