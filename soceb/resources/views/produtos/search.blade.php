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
    @foreach ($produtos as $key => $produto)
        <h1>{{$produto->nome}}</h1>


    <table class="table table-bordered">
        <tr>

            <th>Codigo</th>
            <th>Armario</th>
            <th>Pratileira</th>
            <th>situacao</th>
            <th width="280px">Ação</th>
        </tr>

            <?php $items = App\Item::where('produtos_id','=',$produto->id)->get();?>
            @foreach($items as $item)
            <tr>

                <td>{{ $item->id }}</td>
                <td>{{ $item->armario }}</td>
                <td>{{ $item->pratileira }}</td>
                <td>{{ $item->situacao }}</td>
                <td>
                    <a class="btn btn-info" href="{{route('produto.show', $item->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('produto.edit', $item->id)}}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['produto.destroy', $item->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
            @endforeach
        @endforeach
    </table>



@endsection