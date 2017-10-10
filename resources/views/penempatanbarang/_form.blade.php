<div class="form-group{{ $errors->has('jumlah') ? 'has-error' : '' }}">
	<label>Jumlah Barang</label>
	<div class="form-line">
		{!! Form::text('jumlah',null,['class'=>'form-control']) !!}
		{!! $errors->first('jumlah','<p class="help-block">:message</p>') !!}
	</div>
</div>


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

<div class="form-group{{ $errors->has('barangmasuk_id') ? 'has-error' : '' }}">
	<label>Barang Masuk</label>
	<div class="form-line">
		{!! Form::select('barangmasuk_id', App\Barang::pluck('nama','id')->all(),null,['class'=>'form-control','id'=>'demoSelect','placeholder'=>'-------------------------------------------------------------------------------------Pilih Barang !-------------------------------------------------------------------------------']) !!}
		{!! $errors->first('barangmasuk_id','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tempat_id') ? 'has-error' : '' }}">
	<label>Nama Tempat</label>
	<div class="form-line">
		{!! Form::select('tempat_id', App\Tempat::pluck('nama','id')->all(),null,['class'=>'form-control','id'=>'demoSelecte','placeholder'=>'-------------------------------------------------------------------------------------Pilih Tempat !-------------------------------------------------------------------------------']) !!}
		{!! $errors->first('tempat_id','<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('staff_id') ? 'has-error' : '' }}">
	<label>Nama Staff</label>
	<div class="form-line">
		{!! Form::select('staff_id', App\Staff::pluck('nama','id')->all(),null,['class'=>'form-control','id'=>'demoSelected','placeholder'=>'-------------------------------------------------------------------------------------Pilih Staff !-------------------------------------------------------------------------------']) !!}
		{!! $errors->first('staff_id','<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="pull-right">
               {!! Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Simpan', ['class'=>'btn btn-primary','type'=>'submit']) !!}&nbsp;&nbsp;&nbsp;
                 {!! Form::button('<i class="fa fa-refresh"></i> Reset', ['class'=>'btn btn-danger','type'=>'reset']) !!}
              </div>