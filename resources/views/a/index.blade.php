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
                		<th>Tanggal Penempatan</th>
                		<th>Jumlah</th>
                		<th>Nama Tempat</th>
                		<th>Nama Staff</th>
                		<th>Nama Barang</th>
                		<th>Kode Barang</th>
                		<th>Nama Kategori</th>
                		<th colspan="2">Action</th>
                	</tr>
                </thead>

                	<tbody>
                		@foreach($a as $data)
                		<tr>
                			<td>{{$data->tanggalpenempatanfmt}}</td>
                			<td>{{$data->jumlahpenempatan}}</td>
                			<td>{{$data->namatempat}}</td>                				
                			<td>{{$data->namastaff}}</td>
                			<td>{{$data->namabarang}}</td>
                			<td>{{$data->kodebarang}}</td>
                			<td>{{$data->namakategori}}</td>
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

