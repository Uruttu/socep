<?php

namespace App\Http\Controllers;

use App\Item;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::orderBy('id','ASC')->paginate(5);
        return view('produtos.index',compact('produtos'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'principioAtivo' => 'required',
            'apresentacao' => 'required',
            'conservacao' => 'required',
        ]);

        Produto::create($request->all());
        return redirect()->route('produto.index')
            ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produtos.show',compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('produtos.edit',compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'principioAtivo' => 'required',
            'apresentacao' => 'required',
            'conservacao' => 'required',
        ]);

        Produto::find($id)->update($request->all());
        return redirect()->route('produto.index')
            ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('produto.index')
            ->with('success','Item deleted successfully');
    }

    public function search()
    {
        $search = \Request::get('busca');

        $produtos = Produto::where('nome','like','%'.$search.'%')->
                            orwhere('principioAtivo', 'like','%'.$search.'%')->
                            orwhere('apresentacao', 'like','%'.$search.'%')->
                            orwhere('conservacao','like','%'.$search.'%')->get();

        //$items = Item::where('produto_id', 'like', $produtos->id)->get();

        return view('produtos.search',compact('produtos'));
    }
}
