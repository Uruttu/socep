@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Criar novo Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('item.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'item.store','method'=>'POST')) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <select name="produtos_id" class="form-control">
                    @foreach($produtos as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>armario:</strong>
                {!! Form::text('armario', null, array('placeholder' => 'armario','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>pratileira:</strong>
                {!! Form::text('pratileira', null, array('placeholder' => 'pratileira','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-3">
                <strong>vencimento:</strong>
                {!! Form::date('vencimento', null, array('placeholder' => 'vencimento','class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-3">
                <strong>descarte:</strong>
                {!! Form::text('descarte', null, array('placeholder' => 'descarte','class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-3">
                <strong>situacao:</strong>
                {!! Form::text('situacao', null, array('placeholder' => 'situacao','class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-3">
                <strong>Quantidade</strong>
                {!! Form::number('quantidade', null, array('placeholder' => 'quantidade','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection