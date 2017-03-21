@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left col-md-4">
                <h2>Produtos</h2>
            </div>
            <div class="pull-right col-md-4">
                <a class="btn btn-success" href="{{route('produto.create')}}"> Adicionar Produto</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Principio Ativo</th>
            <th>Apresentação</th>
            <th>Conservação</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($produtos as $key => $produto)

            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->principioAtivo }}</td>
                <td>{{ $produto->apresentacao }}</td>
                <td>{{ $produto->conservacao }}</td>
                <td>
                    <a class="btn btn-info" href="{{route('produto.show', $produto->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('produto.edit', $produto->id)}}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['produto.destroy', $produto->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </table>

    <form method="get" action="{{route('produto.search')}}" class="input-group">
        <input type="text" name="busca" class="form-control">
        <input type="submit" class="btn btn-danger" value="buscar">
    </form>

    {!! $produtos->render() !!}

@endsection