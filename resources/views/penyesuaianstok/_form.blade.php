<div class="form-group{{ $errors->has('tanggal') ? 'has-error' : '' }}">
	<label for="datetimepicker">Tanggal Masuk</label>
	<div class="input-group date"  id='datetimepicker2'>
		{!! Form::date('tanggal',null,['class'=>'form-control','id'=>'datetimepicker2']) !!}
		 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
		{!! $errors->first('tanggal','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('penempatanbarang_id') ? 'has-error' : '' }}">
	<label>Penempatan barang</label>
	<div class="form-line">
		{!! Form::select('penempatanbarang_id', App\Barang::pluck('nama','id')->all(),null,['class'=>'form-control','id'=>'demoSelect','placeholder'=>'-------------------------------------------------------------------------------------Pilih Barang !-------------------------------------------------------------------------------']) !!}
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