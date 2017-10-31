@extends('layouts.login')

@section('content')

    <section class="login-content">
        <h1>APLIKASI INVENTARIS</h1><br>
      <div class="login-box">
       {!! Form::open(['url'=>'login', 'class'=>'login-form']) !!}
       
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::label('email','Alamat Email',['class'=>'control-label']) !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                            {!! $errors->first('email','<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                        {!! Form::label('password','Password',['class'=>'control-label']) !!}
                            {!! Form::password('password',['class'=>'form-control']) !!}
                            {!! $errors->first('password','<p class="help-block">:message</p>') !!}
                    </div>
         
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox"><span class="label-text"> {!! Form::checkbox('remember') !!} Ingat Saya</span>
                </label>
              </div>
            
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
       
          {!! Form::close() !!}
           @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
      </div>
    </section>
@endsection
