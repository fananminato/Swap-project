<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $results = Equipment::orderBy('id', 'desc')->get();
        }else{
            $results = Equipment::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        }
        return view('admin.equipment.index', compact('results'));
    }

    public function create()
    {
        return view('admin.equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'usage_status' => 'required|in:in-use,available,under-maintenance',
            'status'       => 'required|in:active,inactive',
        ]);

        $equipment               = new Equipment();
        $equipment->user_id      = Auth::id();
        $equipment->name         = $request->name;
        $equipment->status       = $request->status;
        $equipment->usage_status = $request->usage_status;
        $equipment->save();

        return redirect()->route('equipments.index')->with('msg', 'Equipment created successfully.');
    }

    public function edit($id)
    {
        $result = Equipment::findOrFail($id);
        return view('admin.equipment.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'usage_status' => 'required|in:in-use,available,under-maintenance',
            'status'       => 'required|in:active,inactive',
        ]);

        $equipment               = Equipment::findOrFail($id);
        $equipment->name         = $request->name;
        $equipment->status       = $request->status;
        $equipment->usage_status = $request->usage_status;
        $equipment->save();

        return redirect()->route('equipments.index')->with('msg', 'Equipment updated successfully.');
    }
}
