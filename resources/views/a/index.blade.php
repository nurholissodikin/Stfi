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
						<div class="panel-title">Barang Masuk<a class="pull-right" href="#">Tambah</a>
					</div>
</div>
					<div class="panel-body">
						
						 <table class="table">
                <thead>
                	<tr>
                		<th>Nama barang</th>
                		<th>total</th>
                		<th colspan="2">Action</th>
                	</tr>
                </thead>

                	<tbody>
                		@foreach($a as $data)
                		<tr>
                			<td>{{$data->barangmasuk_id}}</td>
                			<td>{{$data->total_keluar}}</td>                				
                				@endforeach
                			
                		</tr>
                	</tbody>
                </table>
                	
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

