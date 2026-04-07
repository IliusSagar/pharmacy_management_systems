<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return Supplier::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'contact'=>'nullable|string|max:50',
            'address'=>'nullable|string|max:255',
        ]);

        return Supplier::create($request->all());
    }

    public function show(Supplier $supplier)
    {
        return $supplier;
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return $supplier;
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->json(['message'=>'Supplier deleted']);
    }
}
