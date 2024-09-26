<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\LoanProduct;
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

    public function apply(Request $request)
{
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'loan_product_id' => 'required|exists:loan_products,id',
        'amount' => 'required|numeric',
    ]);

    // Retrieve the loan product and check if the amount is within the allowed limits
    $loanProduct = LoanProduct::find($request->loan_product_id);
    if ($request->amount < $loanProduct->minimum_amount) {
        return back()->with('error', 'Loan amount is below the minimum allowed.');
    }

    // Create the loan application
    Loan::create([
        'customer_id' => $request->customer_id,
        'loan_product_id' => $request->loan_product_id,
        'amount' => $request->amount,
        'balance' => $request->amount, // Balance initially equals to the loan amount
        'status' => 'pending',
    ]);

    return redirect()->route('loans.index')->with('success', 'Loan application submitted.');
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

        // Ensure amount is less than product maximum amount
        if ($request->amount > $loanProduct->maximum_amount) {
            return back()->withErrors(['amount' => 'Amount should be less than or equal to the maximum product amount.']);
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
    if ($loan->status != 'approved') {
        return back()->with('error', 'Loan cannot be disbursed.');
    }

    $loan->update([
        'amount_disbursed' => $loan->amount,
        'status' => 'disbursed',
    ]);

    return back()->with('success', 'Loan disbursed successfully.');
}

    public function repay(Request $request, Loan $loan)
{
    $request->validate([
        'amount' => 'required|numeric',
    ]);

    if ($loan->status != 'disbursed') {
        return back()->with('error', 'Loan cannot be repaid.');
    }

    $newAmountRepaid = $loan->amount_repaid + $request->amount;
    $newBalance = $loan->amount - $newAmountRepaid;

    $loan->update([
        'amount_repaid' => $newAmountRepaid,
        'balance' => $newBalance,
        'status' => $newBalance == 0 ? 'repaid' : 'disbursed',
    ]);

    return back()->with('success', 'Loan repayment successful.');
}

public function report($customerId)
{
    $customer = Customer::find($customerId);
    
    if (!$customer) {
        return back()->with('error', 'Customer not found.');
    }

    // Retrieve all loans for the customer
    $loans = Loan::where('customer_id', $customerId)->get();
    // Calculate total disbursed, total repaid, and remaining balance
    $totalDisbursed = $loans->sum('amount_disbursed');
    $totalRepaid = $loans->sum('amount_repaid');
    $totalBalance = $loans->sum('balance');

    return view('loans.report', compact('customer', 'loans', 'totalDisbursed', 'totalRepaid', 'totalBalance'));
}


}
