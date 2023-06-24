<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::all();
        return view('bank-accounts.index', compact('bankAccounts'));
    }

    public function create()
    {
        return view('bank-accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_number' => [
                'required',
                Rule::unique('bank_accounts')->where(function ($query) use ($request) {
                    return $query->where('user_id', auth()->user()->id);
                }),
            ],
            'bank_name' => 'required',
        ]);

        BankAccount::create([
            'user_id' => auth()->user()->id,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
        ]);

        return redirect()->route('bank-accounts.index')
            ->with('success', 'Bank account created successfully.');
    }

    public function edit(BankAccount $bankAccount)
    {
        return view('bank-accounts.edit', compact('bankAccount'));
    }

    public function update(Request $request, BankAccount $bankAccount)
    {
        $request->validate([
            'account_number' => [
                'required',
                Rule::unique('bank_accounts')->where(function ($query) use ($request) {
                    return $query->where('user_id', auth()->user()->id);
                })->ignore($bankAccount->id),
            ],
            'bank_name' => 'required',
        ]);

        $bankAccount->update([
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
        ]);

        return redirect()->route('bank-accounts.index')
            ->with('success', 'Bank account updated successfully.');
    }

    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();

        return redirect()->route('bank-accounts.index')
            ->with('success', 'Bank account deleted successfully.');
    }
}
