<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('customer', 'loanProduct')->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $customers = Customer::all();
        $loanProducts = LoanProduct::all();
        return view('loans.create', compact('customers', 'loanProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'loan_product_id' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        $loanProduct = LoanProduct::findOrFail($request->loan_product_id);

        // Ensure amount is greater than product minimum amount
        if ($request->amount < $loanProduct->minimum_amount) {
            return back()->withErrors(['amount' => 'Amount should be greater than or equal to the minimum product amount.']);
        }

        $interestRate = $loanProduct->interest_rate;
        $totalRepayable = $request->amount + ($request->amount * ($interestRate / 100));

        Loan::create([
            'customer_id' => $request->customer_id,
            'loan_product_id' => $request->loan_product_id,
            'amount' => $request->amount,
            'interest_rate' => $interestRate,
            'total_repayable' => $totalRepayable,
            'status' => 'pending',
        ]);

        return redirect()->route('loans.index')->with('success', 'Loan application created successfully.');
    }

    public function approve(Loan $loan)
    {
        $loan->status = 'approved';
        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Loan approved successfully.');
    }

    public function disburse(Loan $loan)
    {
        $loan->status = 'disbursed';
        $loan->disbursement_date = now();
        $loan->due_date = now()->addMonths(1);  // Assuming a 1-month repayment period.
        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Loan disbursed successfully.');
    }

    public function repay(Loan $loan)
    {
        $loan->status = 'repaid';
        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Loan repaid successfully.');
    }
}
