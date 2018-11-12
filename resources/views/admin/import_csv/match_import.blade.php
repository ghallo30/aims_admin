@extends('voyager::master')

@section('content')

<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<h2>Import CSV Data</h2>
		<hr/>	
	</div>

	<div class="col-md-12 col-lg-12 col-sm-12">

		<form class="form-horizontal" method="POST" action="{{ route('import_match_process') }}" >
			{{ csrf_field() }}
			<input type="hidden" name="csv_file_data_id" value="{{ $csv_data_file->id }}" />

			<table class="table table-striped">
				@if (isset($csv_header_data))
					<tr>
						@foreach ($csv_header_data as $c_head)
							<th>{{$c_head}}</th>
						@endforeach
					</tr>
				@endif

				@if (isset($csv_sample_data))
					@foreach ($csv_sample_data as $row_data )
						<tr>
							@foreach ($row_data as $cd => $val )
								<td>{{$val}}</td>
							@endforeach		
						</tr>
					@endforeach
					<tr>
						@if (isset($csv_header_data) || isset($data_fillable))
							@foreach ($csv_header_data as $ch )
								<td>
									<select name="imp_fields[{{ $ch }}]">
										@foreach ($data_fillable as $bf )
											<option value="{{$bf}}" > {{ucwords( str_replace('_', ' ', str_replace('id',' ', $bf)) )}} </option>
										@endforeach
									</select>
									
								</td>
							@endforeach
						@else
							<h1>No data to display</h1>
						@endif
					</tr>
				@else
					<tr>
						<h1>No Data to Display</h1>
					</tr>
				@endif

			</table>
			
			<div class="col-sm-12" style="padding-bottom: 20px;">
				<button type="submit" class="btn-flip btn btn-primary">
				<strong>Submit</strong></button>
			</div>

		</form>

	</div>
	
</div>

@endsection