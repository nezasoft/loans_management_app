@extends('layouts.app')

@section('content')
    <h1>Create Loan Product</h1>

    <form action="{{ route('loan_products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="code">Product Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="minimum_amount">Minimum Amount</label>
            <input type="number" name="minimum_amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="interest_rate">Interest Rate (%)</label>
            <input type="number" step="0.01" name="interest_rate" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="currency">Currency</label>
            <input type="text" name="currency" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
@endsection
