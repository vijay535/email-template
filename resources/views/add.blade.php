@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><a href="{{ route('home') }}"> {{ __('Dashboard') }} </a>  <a href="#" class="btn btn-primary">Add Template</a></div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					@if(session()->has('success'))
					    <div class="alert alert-success">
					        {{ session()->get('success') }}
					    </div>
					@endif
					<form method="POST" action="{{ route('add') }}">
						@csrf
						<div class="form-group row">
							<label for="mobile" class="col-md-12 col-form-label text-md-left">{{ __('Template') }}</label>

							<div class="col-md-12">
								<textarea name="message" class="form-control"></textarea>
								@if($errors->has('message'))
								<div class="text-danger">{{ $errors->first('message') }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Save Template') }}
								</button>
							</div>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
