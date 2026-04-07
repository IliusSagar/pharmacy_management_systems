<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;

class AlertController extends Controller
{
    public function index()
    {
        return Alert::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required|string|max:50',
            'message'=>'required|string',
            'date'=>'required|date',
        ]);

        return Alert::create($request->all());
    }

    public function show(Alert $alert)
    {
        return $alert;
    }

    public function update(Request $request, Alert $alert)
    {
        $alert->update($request->all());
        return $alert;
    }

    public function destroy(Alert $alert)
    {
        $alert->delete();
        return response()->json(['message'=>'Alert deleted']);
    }
}
