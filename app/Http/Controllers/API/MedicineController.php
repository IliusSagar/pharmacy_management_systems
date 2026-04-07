<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        return Medicine::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'category'=>'required|string|max:100',
            'batch_no'=>'required|string|max:50|unique:medicines,batch_no',
            'expiry_date'=>'required|date',
            'quantity'=>'required|integer',
            'price'=>'required|numeric',
        ]);

        return Medicine::create($request->all());
    }

    public function show(Medicine $medicine)
    {
        return $medicine;
    }

    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->all());
        return $medicine;
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return response()->json(['message'=>'Medicine deleted']);
    }
}
