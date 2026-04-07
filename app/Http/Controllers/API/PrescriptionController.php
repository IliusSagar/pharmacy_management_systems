<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    public function index()
    {
        return Prescription::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name'=>'required|string|max:255',
            'doctor_name'=>'required|string|max:255',
            'medicine_list'=>'required', // JSON or text
        ]);

        return Prescription::create($request->all());
    }

    public function show(Prescription $prescription)
    {
        return $prescription;
    }

    public function update(Request $request, Prescription $prescription)
    {
        $prescription->update($request->all());
        return $prescription;
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return response()->json(['message'=>'Prescription deleted']);
    }
}
