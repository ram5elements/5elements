@extends('admin.master')

@section('title')
    Dashboard
 @endsection

@section('pagetitle')
    <h3 class="page-title">Dashboard</h3>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Home</a>      
    </ul>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Clients</span>
                    <span class="info-box-number">{{$total_clients}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="icon-bar-chart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Assignments</span>
                    <span class="info-box-number">{{$total_assignments}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Assignments</span>
                    <span class="info-box-number">{{$pending_assignments}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Bills</span>
                    <span class="info-box-number">{{$pending_bills}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

   <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border"> 
                  <!--  <h3 class="box-title">Monthly Report</h3> -->
				   <h3 class="box-title">Summary</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                     
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="margin-left:20px">
                    <div class="row">
                      <!--  <div class="col-md-8">
                            <p class="text-center">
                                <strong>Payments: 1 Jan, 2016 - 30 Jul, 2016</strong>
                            </p>
                            <div class="chart"> -->
                                <!-- Sales Chart Canvas -->
                             <!--     <canvas id="salesChart" style="height: 180px;"></canvas>
                            </div> <!-- /.chart-responsive -->
                     <!--  </div>  <!-- /.col -->  
					    
					
						<div class="col-md-6" >	                        
							<p class="text-center">
                                <strong>Upcoming Reminders</strong>
                            </p> 							
							<div class="box-body"  style="overflow-y:scroll;overflow-x:hidden;height:300px">								
								@if( ! empty($work_master))
									<table id="dtWork" class="table table-hover">
									  <thead>
										<tr>										 
										  <th>Work</th>
										  <th>Due Date</th>		
										  <th>Fees</th>												  
										</tr>
									  </thead>
									  <tbody>	                                      					  
										@foreach($work_master as $work)
										   @if ($work->due_date == $upcoming_duedate || ($work->due_date < $upcoming_duedate  && $work->due_date >= Carbon\Carbon::today()->format('Y-m-d')))
											<tr>																		   
												<td>{{ $work->work }}</td>
												<td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $work->due_date)->format('d/m/Y') }}</td>							
												<td>{{ $work->fees }}</td>	
											</tr>
										   @endif 	
										@endforeach
									  </tbody>
									</table>
								@else
									<table id="dtWork" class="table table-hover" > 
									  <tbody>No records found</tbody>				
									</table>
								@endif                  
							</div><!-- /.box-body -->                          				   	
						</div>
					   
                        <div class="col-md-6">						  
                            <p class="text-center">
                                <strong>Goal Completion</strong>
                            </p>
						   <div class="box-body" style="height:300px">	
                            <div class="progress-group">
                                <span class="progress-text">Pending Assignments</span>
                                <span class="progress-number"><b>{{$pending_assignments}}</b>/{{$total_assignments}}</span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-aqua" style="width: {{($pending_assignments/$total_assignments)*100}}%"></div>
                                </div>
                            </div><!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Pending Bills</span>
                                <span class="progress-number"><b>{{$pending_bills}}</b>/8</span>
                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                </div>
                            </div><!-- /.progress-group --> 
                          </div>                         					  
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- ./box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->

        <div class="col-md-6" >
            <!-- TABLE: Client Table -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Client Details</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body "  style="overflow-y:scroll;overflow-x:hidden;height:300px;margin-left:20px">                   
					  @if( ! empty($clients))
                        <table id="dtClient" class="table table-hover">
                            <thead>
							  <tr>								
								<th>Name</th>
								<th>Mobile No.</th>
								<th>Email Id</th>								                                    
							  </tr>
							</thead>
                            <tbody>				
								@foreach($clients as $client)
								<tr>															  
									<td>{{ $client->name }}</td>						   
									<td>{{ $client->mobile_number }}</td>
									<td>{{ $client->email_id }}</td>							
								</tr>
								@endforeach
							</tbody>
                        </table>
					  @else
						<table id="dtClient" class="table table-hover" > 
							<tbody>No records found</tbody>				
						</table>
					  @endif	
                  
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-6">

            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Employee Details</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body "  style="overflow-y:scroll;overflow-x:hidden;height:300px;margin-left:20px">                   
					  @if( ! empty($employees))
                        <table id="dtEmployee" class="table table-hover">
                            <thead>
							  <tr>								
								<th>Name</th>
								<th>Mobile No.</th>
								<th>Email Id</th>								                                    
							  </tr>
							</thead>
                            <tbody>				
								@foreach($employees as $employee)
								<tr>															  
									<td>{{ $employee->name }}</td>						   
									<td>{{ $employee->mobile_number }}</td>
									<td>{{ $employee->email_id }}</td>							
								</tr>
								@endforeach
							</tbody>
                        </table>
					  @else
						<table id="dtEmployee" class="table table-hover" > 
							<tbody>No records found</tbody>				
						</table>
					  @endif	
                  
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
 @endsection
 
 @section('javascript')
    <script>
       
		$('#dtClient').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});	   
		
		$('#dtEmployee').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});	

       $('#dtWork').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});		
    </script>    
@endsection