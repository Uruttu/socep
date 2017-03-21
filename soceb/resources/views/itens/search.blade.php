@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left col-md-4">
                <h2>Busca</h2>
            </div>

        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>armario</th>
            <th>pratileira</th>
            <th>vencimento</th>
            <th>situacao</th>
            <th>descarte</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produtos as $key => $produto)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->descricao }}</td>
                <td>{{ $produto->principioAtivo }}</td>
                <td>{{ $produto->conservacao }}</td>
                <td></td>
                <td></td>
                <td>

                </td>
            </tr>
        @endforeach
    </table>
@endsection