<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create()
    {
        // Return the view for creating a new expense
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'expense_date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $expense = new Expense();
        $expense->project_id = $request->input('project_id');
        $expense->expense_date = $request->input('expense_date');
        $expense->description = $request->input('description');
        $expense->amount = $request->input('amount');
        $expense->save();

        return redirect()->route('expenses.index');
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);

        // Return the view for editing the expense
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'expense_date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->project_id = $request->input('project_id');
        $expense->expense_date = $request->input('expense_date');
        $expense->description = $request->input('description');
        $expense->amount = $request->input('amount');
        $expense->save();

        return redirect()->route('expenses.index');
    }

    public function index()
    {
        $expenses = Expense::all();

        // Return the view with a list of expenses
        return view('expenses.index', compact('expenses'));
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        // Return the view with the expense details
        return view('expenses.show', compact('expense'));
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index');
    }
}
