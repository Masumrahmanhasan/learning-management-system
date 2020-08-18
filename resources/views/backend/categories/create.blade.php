@extends('backend.layouts.app')

@section('title', __('labels.backend.categories.title').' | '.app_name())

@push('after-styles')
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}"/>
@endpush

@section('content')

			<div class="card">
				<div class="card-header">
					<h3 class="page-title d-inline">@lang('labels.backend.categories.create')</h3>
		            <div class="float-right">
		                <a href="{{ route('admin.categories.index') }}"
		                   class="btn btn-info">@lang('labels.backend.categories.view')</a>

		            </div>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							{!! Form::open(['method' => 'POST', 'route' => ['admin.categories.store'], 'files' => true]) !!}

							<div class="row justify-content-center">
		                        <div class="col-md-4 form-group">
		                            {!! Form::label('title', trans('labels.backend.categories.fields.name').' *', ['class' => 'control-label']) !!}
		                            {!! Form::text('name', old('name'), 
		                            ['class' => 'form-control '.($errors->has('name') ? 'border-danger':''), 'placeholder' => trans('labels.backend.categories.fields.name'), 'required' => false]) !!}

		                        </div>


		                        <div class="col-lg-2 form-group">

		                                {!! Form::label('icon',  trans('labels.backend.categories.fields.select_icon'),['class' =>'control-label ']) !!}
		                           <button class="btn btn-block btn-default" id="icon" name="icon">
										
									</button>

		                        </div>

		                        <div class="col-lg-12 form-group text-center">

		                            {!! Form::submit(trans('strings.backend.general.app_save'), ['class' => 'btn btn-wide btn-danger mt-auto']) !!}
		                        </div>
	                    	</div>

                    		{!! Form::close() !!}

						</div>
					</div>

					
				</div>
			</div>
@stop

@push('after-scripts')

	<script src="{{asset('plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.bundle.min.js')}}"></script>

    <script>
        
            $('#icon').iconpicker({
                cols: 10,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 4,
                search: true,
                searchText: 'Search',
                selectedClass: 'btn-success',
                unselectedClass: ''
            });

    </script>

@endpush

