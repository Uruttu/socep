@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produto.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong><br>
                {{ $produto->nome}}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>principioAtivo:</strong><br>
                {{ $produto->principioAtivo}}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>apresentacao:</strong><br>
                {{ $produto->apresentacao}}
            </div>
        </div></div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>conservacao:</strong><br>
                {{ $produto->conservacao    }}
            </div>
        </div>
    </div>

@endsection