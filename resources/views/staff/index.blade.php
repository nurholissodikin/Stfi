@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Staff</li>
				</ul>
				<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">Staff<a class="pull-right" href="{{ route('staff.create') }}">Tambah</a>
				</div>
				</div>
				<div class="panel-body">
				
					{!! $html->table(['class'=>'table-striped']) !!}
				</div>
				 <div class="row hidden-print mt-20">
                  <div class="col-xs-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
                </div>
			</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $html->scripts() !!}
@endsection