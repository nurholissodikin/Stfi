<div class="form-group{{ $errors->has('tanggal') ? 'has-error' : '' }}">
	<label>Tanggal Masuk</label>
	<div class="form-line">
		{!! Form::date('tanggal',null,['class'=>'form-control']) !!}
		{!! $errors->first('tanggal','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('penempatanbarang_id') ? 'has-error' : '' }}">
	<label>Penempatan Barang</label>
	<div class="form-line">
		{!! Form::select('penempatanbarang_id', App\PenempatanBarang::pluck('jumlah','id')->all(),null,['class'=>'form-control','placeholder'=>'Pilih Penempatan Barang']) !!}
		{!! $errors->first('penempatanbarang_id','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('stok_penggunaan') ? 'has-error' : '' }}">
	<label>Stok Penggunaan</label>
	<div class="form-line">
		{!! Form::text('stok_penggunaan',null,['class'=>'form-control']) !!}
		{!! $errors->first('stok_penggunaan','<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn btn-primary','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn btn-danger','type'=>'reset']) !!}
              </div>