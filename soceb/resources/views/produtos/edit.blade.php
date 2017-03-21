@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produto.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Deu erro no formulario.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($produto, ['method' => 'PATCH','route' => ['produto.update', $produto->id]]) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {!! Form::text('nome', null, array('placeholder' => $produto->nome,'class' => 'form-control')) !!}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>principioAtivo:</strong>
                {!! Form::text('telefone', null, array('placeholder' => $produto->principioAtivo,'class' => 'form-control')) !!}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>apresentacao:</strong>
                {!! Form::text('email', null, array('placeholder' => $produto->apresentacao,'class' => 'form-control')) !!}
            </div>
        </div></div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>conservacao:</strong>
                {!! Form::text('email', null, array('placeholder' => $produto->conservacao,'class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection