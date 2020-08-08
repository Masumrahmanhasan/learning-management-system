@extends('backend.layouts.app')

@section('title', __('Categories').' | '.app_name())
@section('content')
<div class="container-fluid container-fullw ">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
        <div class="card-header">

            <h3 class="page-title d-inline">Categories</h3>
            <div class="float-right">
                <a href="{{ route('admin.categories.create') }}"
                   class="btn btn-info">Add New</a>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <div class="d-block">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href=""
                                       style="">All</a>
                                </li>
                                |
                                <li class="list-inline-item">
                                    <a href=""
                                       style=""> Trash</a>
                                </li>
                            </ul>
                        </div>

                        <table id="myTable"
                               class="table table-bordered table-striped @can('category_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                            <thead>
                            <tr>

                                @can('category_delete')
                                    @if ( request('show_deleted') != 1 )
                                        <th style="text-align:center;">
                                            <input type="checkbox" class="mass" id="select-all"/>
                                        </th>
                                    @endif
                                @endcan
								<th style="text-align:center;">
                                            <input type="checkbox" class="mass" id="select-all"/>
                                        </th>
                                <th>SR</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Icon</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
		</div>
	</div>
</div>
	
@stop

@push('after-scripts')
	<script>
		$(document).ready(function(){
			$('#myTable').DataTable({
				processing:true,
				serverSide:false,
				retrieve:true,
				dom:'lfBrtip<"actions">',
				buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [1, 2, 3, 5]

                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [1, 2, 3, 5]
                        }
                    },
                    'colvis'
                ],


			})
		})
	</script>
@endpush