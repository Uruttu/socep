<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use App\Item;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itens = Item::orderBy('id','ASC')->paginate(5);
        return view('itens.index',compact('itens'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = \App\Produto::select('id', 'nome')->get();

        return view('itens.create',compact('produtos'));

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
            'armario' => 'required',
            'pratileira' => 'required',
            'vencimento' => 'required',
            'situacao' => 'required',
            'descarte' => 'required',
            'produtos_id' => 'required',
            'quantidade' => 'required',

        ]);
        for ($i = 0; $i < $request->quantidade; $i++) {
            Item::create($request->all());
        }
        return redirect()->route('item.index')
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
        $item = Item::find($id);
        return view('itens.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('itens.edit',compact('item'));
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
            'armario' => 'required',
            'pratileira' => 'required',
            'vencimento' => 'required',
            'situacao' => 'required',
            'descarte' => 'required',
        ]);

        Item::find($id)->update($request->all());
        return redirect()->route('item.index')
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
        Item::find($id)->delete();
        return redirect()->route('item.index')
            ->with('success','Item deleted successfully');
    }

    public function search()
    {

        $search = \Request::get('busca');

        $itens = Item::where('armario', 'like','%'.$search.'%')->
                            orwhere('pratileira', 'like','%'.$search.'%')->
                            orwhere('vencimento', 'like','%'.$search.'%')->
                            orwhere('situacao', 'like','%'.$search.'%')->
                            orwhere('descarte','like','%'.$search.'%')->get();

        return view('itens.search',compact('itens'));
    }
    public function searchProduto(){
        $search = \Request::get('busca');
        $itens = Produto::join('items','id','produtos_id')
                    ->where('nome','like','%'.$search.'%')-get();
        return view('itens.search',compact('itens'));
    }
}
