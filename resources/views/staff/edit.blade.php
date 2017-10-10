@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/admin/staff') }}">Staff</a></li>
					<li class="active">Ubah Staff</li>
				</ul>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Ubah Staff</h2>
					</div>

					<div class="panel-body">
					<table class="table">
						{!! Form::model($staff,['url' => route('staff.update',$staff->id),
						'method'=>'put','class'=>'form-horizontal']) !!}
						@include('staff._form')
						{!! Form::close() !!}
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection