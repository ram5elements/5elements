@extends('admin.master')

@section('title')
    Assign Work
 @endsection
 
@section('pagetitle')
    <h3 class="page-title">Assign Work</h3>

    <ul class="breadcrumb">        
        <li>
			<i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{asset('admin/work/assign_work')}}">Assign Work</a>
        </li>
    </ul>
@endsection

@section('content')

 <div class="box box-primary col-md-12">
       
            <form role="form" method="post" action="{{url('admin/work/assign_work')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">                       
                        <div class="box-body">
						 <div class="row">
						  <div class="col-md-4">
							<div class="form-group">
                                <label for="inputClient">Select Client:</label>								
									{{ Form::select('client_id', $clients,null,['placeholder' => 'Select client'],['class' => 'form-control input-sm']) }}
                            </div>
							<div class="form-group">								
                                <div class="input-group">								
                                    <div class="input-group-addon input-sm">
										<b>Start Date:</b>
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="datemask1" name="start_date" class="form-control input-sm" placeholder="dd/mm/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div><!-- /.input group -->                            
                            </div>
						  </div> <!-- /.col-md-4 -->	
							
						  <div class="col-md-4">	
                            <div class="form-group">
                                 <label for="inputWork">Select Work:</label>								
									{{ Form::select('work_id', $work,null,['placeholder' => 'Select work'],['class' => 'form-control input-sm']) }}                               
							</div>
							<div class="form-group">                               
                                <div class="input-group">
                                    <div class="input-group-addon input-sm">
										<b>End Date:</b>
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="datemask2" name="end_date"  class="form-control input-sm" placeholder="dd/mm/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div><!-- /.input group -->
                            </div>
						   </div> <!-- /.col-md-4 -->
						   
						   <div class="col-md-4">
							<div class="form-group">
								 <label for="inputFName">Select Employee:</label>								
									{{ Form::select('employee_id', $employees,null,['placeholder' => 'Select employee'],['class' => 'form-control input-sm']) }}                               
							</div>
							<div class="form-group">								
								<button type="submit" name="submit" class="btn btn-primary btn-xs">Assign Task</button>
							</div>
						   </div> <!-- /.col-md-4 -->						   
						  </div> <!-- /.row -->	 
                        </div><!-- /.box-body -->                       
                    </form>          
       
    </div>

    <div class="box box-primary col-md-12" style="overflow:scroll;height:300px" >
      
         <form role="form">         
		   <div class="box-body" >
		
			@if( ! empty($arrData))
             <table id="dtWork" class="table table-bordered dataTable" > 		
                <thead>
                <tr>                   
                    <th>Client</th>
					<th>Work</th>
                    <th>Start Date</th>
                    <th>End Date</th>
					<th>Assigned to Employee</th>
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
							<td>{{ $item->emp_name }}</td>				
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
		  </form>        
    </div>  

@endsection

@section('javascript')
    <script>
         $("#dtWork").DataTable();

         //Datemask dd/mm/yyyy
         $("#datemask1").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
         $("#datemask2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    </script>

 @endsection