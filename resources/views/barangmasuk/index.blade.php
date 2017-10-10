@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
				<ul class="breadcrumb">
					<li class="active">Barang Masuk</li>
				</ul>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">Barang Masuk<a class="pull-right" href="{{ route('barangmasuk.create') }}">Tambah</a>
					</div>
</div>
					<div class="panel-body">
						
						{!! $html->table(['class'=>'table-striped']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $html->scripts() !!}
@endsection