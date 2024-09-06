<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Pedido::with('produto')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'produto_id'=>'required|exists:produtos,id',
            'quantidade'=>'required|integer|min:1',
        ]);
        $produto = Produto::find($validated['produto_id']);
        $totalPreco = $produto->preco*$validated['quantidade'];
        $pedido = Pedido::create([
            'produto_id'=>$validated['produto_id'],
            'quantidade'=>$validated['quantidade'],
            'total_preco'=> $totalPreco,
        ]);
        return response()->json($pedido,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
        return response()->json($pedido->load('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
