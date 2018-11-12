@extends('voyager::master')

@section('content')

<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<h2>Import CSV Data</h2>
		<hr/>	
	</div>

	<div class="col-md-12 col-lg-12 col-sm-12">

		<form method="POST" action="{{ route('import_parse') }}" 
		enctype="multipart/form-data" >
			{{ csrf_field() }}
				<div class="col-sm-12">
						<div class="col-sm-12" style="padding-bottom: 20px;">
								<div class="form-group">
									<label for="csv-file-name" > File Name 
									<span class="required">*</span></label>

									<input placeholder="File Name" id="csv-file-name" type="file" 
										name="csv_file" required />

									@if ($errors->has('csv_file'))
										<span class="help-block text-info" >
											<strong>{{ $errors->first('csv_file') }}</strong>
										</span>
									@endif
								</div>

								<div class="checkbox" style="padding-top: 40px; padding-bottom: 20px;">
										<label>
											<input type="checkbox" name="csv_header"  /> CSV with Header<span>*</span> 
										</label> 
										
								</div>

								<div class="form-group">
								<label for="attribute_csv_form"> Attribute<span class="required">*</span> </label>
								<input list="attr_lists" id="attribute_csv_form" name="attribute_csv" required >
									<datalist id="attr_lists">
										@foreach ($aims_table as $bf )
											<option value="{{$bf}}" > {{ucwords(str_replace('_', ' ', $bf))}} </option>	
										@endforeach
									</datalist>
								</div>

								<div class="col-sm-12" style="padding-bottom: 20px;">
									<button type="submit" class="btn-flip btn btn-primary">
									<strong>Upload</strong></button>
								</div>
						</div>
				</div>
		</form>
	</div>
	
</div>

@endsection