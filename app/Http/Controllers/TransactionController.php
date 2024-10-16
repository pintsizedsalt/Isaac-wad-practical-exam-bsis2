<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactions = Transaction::orderBy('updated_at', 'desc')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransaction()
    {
        return view('create-transaction');
    }

    public function storeTransaction(Request $request)
    {
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:200',
            'description' => 'required|string|max:200',
            'status' => 'required|string|in:successful,declined|max:20',
            'total_amount' => 'required|numeric',
        ]);

        $transaction = new Transaction();
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
    
        $transaction->transaction_number = $this->generateTransactionNumber();
    
        $transaction->save();

        return redirect()->route('showAllTransactions')->with('success', 'Transaction created successfully');
    }

    private function generateTransactionNumber()
    {
    return 'TN' . strtoupper(uniqid());
    }

    public function viewTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction) {
            return view('transaction', ['transaction' => $transaction]);
        }

        return redirect()->route('showAllTransactions')->with('error', 'Transaction not found');
    }

    public function editTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction) {
            return view('edit-transaction', ['transaction' => $transaction]);
        }

        return redirect()->route('showAllTransactions')->with('error', 'Transaction not found');
    }

    public function updateTransaction(Request $request)
{
    $validated = $request->validate([
        'transaction_title' => 'required|string|max:200',
        'description' => 'required|string|max:200',
        'status' => 'required|string|in:successful,declined|max:20',
        'total_amount' => 'required|numeric|',
    ]);

    $transaction = Transaction::find($request->id);

    if ($transaction) {
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->save();

        return redirect()->route('showAllTransactions')->with('success', 'Transaction updated successfully');
    }

    return redirect()->route('showAllTransactions')->with('error', 'Transaction not found');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction)
        {
            $transaction->delete();
        }
        return redirect()->route('showAllTransactions')->with('success', 'Transaction deleted successfully');
    }
}

