<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        return Sale::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'medicine_id'=>'nullable|integer',
            'customer_name'=>'required|string|max:255',
            'quantity'=>'required|integer',
            'total_price'=>'required|numeric',
            'prescription_id'=>'nullable|integer',
        ]);

        return Sale::create($request->all());
    }

    public function show(Sale $sale)
    {
        return $sale;
    }

    public function update(Request $request, Sale $sale)
    {
        $sale->update($request->all());
        return $sale;
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return response()->json(['message'=>'Sale deleted']);
    }
}
