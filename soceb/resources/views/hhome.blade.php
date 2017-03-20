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
@endsection
