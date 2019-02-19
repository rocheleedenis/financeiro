<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Http\Requests\RequestConta;

class ContasController extends Controller
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
     * Mostra todas as contas do usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contas = Conta::where('user_id', auth()->id())->get();

        $bancos = \DB::table('bancos')
            ->select('nome', 'logo', 'id')
            ->get();

        return view('contas.index', compact('contas', 'bancos'));
    }

    /**
     * Salva nova conta do usuário.
     *
     * @param RequestConta $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestConta $request)
    {
        $request->persists();

        return redirect()->back();
    }

    /**
     * Altera uma conta do usuário.
     *
     * @param RequestConta $request
     * @param Conta        $conta
     * @return \Illuminate\Http\Response
     */
    public function update(RequestConta $request)
    {
        $request->update();

        return redirect()->back();
    }
}
