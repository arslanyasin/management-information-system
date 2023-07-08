<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        // Show create form
    }

    public function store(Request $request)
    {
        // Validate and store the opportunity
    }

    public function show($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.show', compact('opportunity'));
    }

    public function edit($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the opportunity
    }

    public function destroy($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();
        return redirect()->route('opportunities.index');
    }
}
