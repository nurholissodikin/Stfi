{!! Form::model($model, ['url' => $form_url, 'method' => 'delete','class'=>'form-inline js-confirm' ,'data-confirm'=>$confirm_message]) !!}
<a href="{{ $edit_url }}" class="btn btn-xs btn-default waves-effect"><i class="fa fa-edit"></i></a>
{!! Form::button('<i class="fa fa-trash"></i>',['class'=>'btn btn-xs btn-danger waves-effect','type'=>'submit']) !!}
{!! Form::close() !!}