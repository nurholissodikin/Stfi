@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/admin/tempat') }}">Tempat</a></li>
					<li class="active">Tambah Tempat</li>
				</ul>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Tambah Tempat</h2>
					</div>

					<div class="panel-body">
					<table class="table"> 
						{!! Form::open(['url'=>route('tempat.store'),
						'method'=>'post','class'=>'form-horizontal']) !!}
						@include('tempat._form')
						{!! Form::close() !!}
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection