@extends('admin.master')

@section('title')
    Work Master
@endsection

@section('pagetitle')
    <h3 class="page-title">Work Master</h3>

    <ul class="breadcrumb">        
        <li>
			<i class="icon-home"></i>
            <a href="{{asset('admin/dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="{{asset('admin/registration/work_master')}}">Work Master</a>
        </li>
    </ul>
@endsection


@section('content')
   @if (count($errors) > 0)
						<div>
							<ul class="alert" style="color:red;">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>							
						</div>
	@endif
    <div>
      <div class="box box-primary">
	    <form role="form" method="post" action="{{url('admin/registration/work_master')}}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
		   <div class="box-body" style="overflow:scroll;height:300px">
            <table id="dtWork" class="table table-bordered dataTable" >
                <thead>
                <tr>
				    <th>No.</th>
                    <th>Work</th>
                    <th>Due Days</th>                    
					<th>Due Date</th>
					<th>Fees</th>					
                </tr>
                </thead>
                <tbody>
					@foreach($data as $item)
						<tr>
							<td><span>{{$item->id}}</span>
								<input type="hidden" name="id[]" value="{{$item->id}}">
							</td>
							<td><span>{{$item->work}}</span></td>
							<td><input type="number" name="due_days[]" value="{{$item->due_days}}" min="1" max="12"></td>				
							<td>
								 <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="duedatemask" name="due_date[]" value="{{ Carbon\Carbon::createFromFormat('Y-m-d', $item->due_date)->format('d/m/Y') }}" class="form-control" placeholder="dd/mm/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
							</td>
							<td><input type="textbox" class="form-control" id="lblFees" name="fees[]" value="{{$item->fees}}"></td>                    							
						</tr> 
					@endforeach                
                </tbody>
            </table>
			
			 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
           </div>		  
		</form>          
      </div>
    </div>  
@endsection

@section('javascript')
	<script>	
		 $("#duedatemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
		//$("#duedatemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});		
		 // $("#duedatemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"},{ "yearrange": "{ 'minyear': '2016', 'maxyear': '2017' }"});		
	</script>
@endsection