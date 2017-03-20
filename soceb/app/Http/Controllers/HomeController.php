<?php

namespace App\Http\Controllers;

use App\Item;
use App\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hhome');
    }
    public function dtVencida(){
        $currentDate = date('Y-m-d');
        $addData =date('Y-m-d', strtotime("+7 days",strtotime($currentDate)));
        $itens = Item::whereDate('vencimento', '<', $currentDate)->get();
        $result = count($itens);

        $itens2 = Item::where('situacao', 'like', 'aberto')->get();
        $abertos = count($itens2);

        $itens3 = Item::whereDate('vencimento', '>', $currentDate)->
            whereDate('vencimento','<',$addData)->get();
        $aVencer = count($itens3);

        $i=0;
        $produtos = Produto::all();
        foreach ($produtos as $produto){
            $itens = Item::where('produtos_id','=', $produto->id)->get();
            $count = count($itens);
            if($count == 0){
                $i++;
            }
        }


        return view('hhome',compact('result','abertos','aVencer','i','produtos'));
    }

}
