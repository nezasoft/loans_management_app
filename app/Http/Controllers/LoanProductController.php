<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LoanProduct;
class LoanProductController extends Controller
{
    public function index()
    {
        
        $loanProducts = LoanProduct::all();
        return view('products.index', compact('loanProducts'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:loan_products',
            'minimum_amount' => 'required|numeric',
            'maximum_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'currency' => 'required',
        ]);
        LoanProduct::create($request->all());
        return redirect()->route('products.index');
    }
    public function edit(LoanProduct $loanProduct)
    {
        return view('products.edit', compact('loanProduct'));
    }
    public function update(Request $request, LoanProduct $loanProduct)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:loan_products,code,'.$loanProduct->id,
            'minimum_amount' => 'required|numeric',
            'maximum_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'currency' => 'required',
        ]);
        $loanProduct->update($request->all());
        return redirect()->route('products.index');
    }
    public function destroy(LoanProduct $loanProduct)
    {
        $loanProduct->delete();
        return redirect()->route('products.index');
    }
}
