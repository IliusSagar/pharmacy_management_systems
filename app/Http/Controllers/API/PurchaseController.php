<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        return Purchase::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id'=>'nullable|integer',
            'medicine_id'=>'nullable|integer',
            'quantity'=>'required|integer',
            'price'=>'required|numeric',
            'purchase_date'=>'required|date',
        ]);

        return Purchase::create($request->all());
    }

    public function show(Purchase $purchase)
    {
        return $purchase;
    }

    public function update(Request $request, Purchase $purchase)
    {
        $purchase->update($request->all());
        return $purchase;
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return response()->json(['message'=>'Purchase deleted']);
    }
}
