@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/admin/barangmasuk') }}">Barang Masuk</a></li>
					<li class="active">Ubah Barang Masuk</li>
				</ul>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Ubah Barang Masuk</h2>
					</div>

					<div class="panel-body">
					<table class="table">
						{!! Form::model($barangmasuk,['url' => route('barangmasuk.update',$barangmasuk->id),
						'method'=>'put','class'=>'form-horizontal']) !!}
						@include('barangmasuk._form')
						{!! Form::close() !!}
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection