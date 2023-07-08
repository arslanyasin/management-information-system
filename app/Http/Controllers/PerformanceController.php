<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::all();
        return view('performances.index', compact('performances'));
    }

    public function create()
    {
        // Show create form
    }

    public function store(Request $request)
    {
        // Validate and store the performance
    }

    public function show($id)
    {
        $performance = Performance::findOrFail($id);
        return view('performances.show', compact('performance'));
    }

    public function edit($id)
    {
        $performance = Performance::findOrFail($id);
        return view('performances.edit', compact('performance'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the performance
    }

    public function destroy($id)
    {
        $performance = Performance::findOrFail($id);
        $performance->delete();
        return redirect()->route('performances.index');
    }
}
