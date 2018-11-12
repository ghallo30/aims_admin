@extends('voyager::master')

@section('content')

<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<h2>Import CSV Data</h2>
		<hr/>	
	</div>

	<div class="col-md-12 col-lg-12 col-sm-12">
		<table class="table table-hover no-footer">
		@foreach ($data_append as $row_data )
			<tr>
				@foreach ($row_data as $cd => $val )
					<td>{{$val}}</td>
				@endforeach		
			</tr>
		@endforeach
		</table>
	</div>
	
</div>

@endsection