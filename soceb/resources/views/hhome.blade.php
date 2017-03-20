@extends('layouts.app')

@section('content')
    <div class="row"><h1 class="warning">Atenção</h1></div>
    <div class="row">
        <div class="col-xs-6 col-sm-3 placeholder">
            <form method="post">
                <input type="submit" name="abertos" class="vencendo atencao img-responsive" value="{{$abertos}}">
            </form>
            <h4>Produtos Abertos</h4>
            <span class="text-muted">Utilize esses produtos</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <form method="post">
                <input type="submit" name="vencidos" class="vencendo atencao img-responsive" value="{{$result}}">
            </form>
            <h4>Vencidos</h4>
            <span class="text-muted">Remova do estoque</span>
            <span class="text-muted">Produtos necessitam ser repostos</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <a href=""></a>
            <div class="vencendo atencao img-responsive">{{$aVencer}}</div>
            <h4>Próximo do Vencimento</h4>
            <span class="text-muted">Utilize esses produtos</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <div class="vencendo atencao img-responsive">{{$i}}</div>
            <h4>Produtos em falta</h4>
            <span class="text-muted">Produtos necessitam ser repostos</span>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome Produto</th>
                    <th>Itens Fechado</th>
                    <th>Itens Abertos</th>
                    <th>Itens Proximo do Vencimento</th>
                    <th>Itens Vencidos</th>

                </tr>
            </thead>
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
    </div>

@endsection
