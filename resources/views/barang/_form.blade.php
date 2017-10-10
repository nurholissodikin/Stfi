<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	<label>Nama Barang</label>
	<div class="form-line">
		{!! Form::text('nama',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('kode') ? 'has-error' : '' }}">
	<label>Kode Barang</label>
	<div class="form-line">
		{!! Form::text('kode',null,['class'=>'form-control']) !!}
		{!! $errors->first('kode','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('kategori_id') ? 'has-error' : '' }}">
	<label>Nama Kategori</label>
	<div class="form-line">
		{!! Form::select('kategori_id', App\Kategori::pluck('nama','id')->all(),null,['class'=>'form-control','id'=>'demoSelect','placeholder'=>'-------------------------------------------------------------------------------------Pilih Kategori !------------------------------------------------------------------------------']) !!}
		{!! $errors->first('kategori_id','<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn btn-primary','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn btn-danger','type'=>'reset']) !!}
              </div>