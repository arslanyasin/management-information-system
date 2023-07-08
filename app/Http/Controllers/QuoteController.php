<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {
        // Show create form
    }

    public function store(Request $request)
    {
        // Validate and store the quote
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return view('quotes.show', compact('quote'));
    }

    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        return view('quotes.edit', compact('quote'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the quote
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();
        return redirect()->route('quotes.index');
    }
}
