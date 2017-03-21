@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left col-md-4">
                <h2>Itens</h2>
            </div>
            <div class="pull-right col-md-4">
                <a class="btn btn-success" href="{{ route('item.create') }}"> Criar novo Item</a>
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
            <th>Produto</th>
            <th>armario</th>
            <th>pratileira</th>
            <th>vencimento</th>
            <th>situacao</th>
            <th>descarte</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($itens as $key => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->produtos->nome }}</td>
                <td>{{ $item->armario }}</td>
                <td>{{ $item->pratileira }}</td>
                <td>{{ $item->vencimento }}</td>
                <td>{{ $item->situacao }}</td>
                <td>{{ $item->descarte }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('item.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('item.edit',$item->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['item.destroy', $item->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <form method="get" action="{{route('item.search')}}" class="input-group">
        <input type="text" name="busca" class="form-control">
        <input type="submit" class="btn btn-danger" value="buscar">
    </form>

    {!! $itens->render() !!}

@endsection