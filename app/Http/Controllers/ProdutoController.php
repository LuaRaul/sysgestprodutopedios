<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Produto::all());
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
            'nome'=>'required|string|max:255',
            'descricao'=>'nullable|string',
            'preco'=>'required|numeric',
            'stock'=>'required|integer',
        ]);
        $produto = Produto::create($validated);
        return response()->json($produto,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
        return response()->json($produto);

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
    public function update(Request $request, Produto $produto)
    {
        //
        $validated = $request->validate([
            'nome'=>'required|string|max:255',
            'descricao'=>'nullable|string',
            'preco'=>'required|numeric',
            'stock'=>'required|integer',
        ]);
        $produto->update($validated);
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json(null,204);
    }
}
