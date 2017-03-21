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
                    <th>Proximo do Vencimento</th>
                    <th>Itens Vencidos</th>
                    <th>Ação</th>
                </tr>
            </thead>
            @foreach ($produtos as $key => $produto)
                @php
                $items = \App\Item::where('situacao','like','aberto')->where('produtos_id','=',$produto->id)->get();
                $items2 = \App\Item::where('situacao','like','fechado')->where('produtos_id','=',$produto->id)->get();
                $items3 = \App\Item::where('vencimento', '<', $currentDate)->where('produtos_id','=',$produto->id)->get();
                $items4 = \App\Item::where('vencimento', '>', $currentDate)->where('produtos_id','=',$produto->id)->
                            whereDate('vencimento','<',$addData)->get();
                $count = count($items); $count2 = count($items2); $count4 = count($items4); $count3 = count($items3);
                @endphp
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $count2  }}</td>
                    <td>{{ $count }}</td>
                    <td>{{ $count4 }}</td>
                    <td>{{ $count3 }}</td>
                    <td>
                        <a class="btn btn-primary" href="#">Edit</a>
                        {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        </table>

        <div class="row" style="margin: 0 auto; width: 25%;">
            {!! $produtos->render() !!}
        </div>
    </div>

@endsection
