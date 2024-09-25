@extends('layouts.app')

@section('content')
    <h1>Loan Products</h1>
    <a href="{{ route('loan_products.create') }}" class="btn btn-primary">Create New Loan Product</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Minimum Amount</th>
                <th>Interest Rate</th>
                <th>Currency</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loanProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->minimum_amount }}</td>
                    <td>{{ $product->interest_rate }}%</td>
                    <td>{{ $product->currency }}</td>
                    <td>
                        <a href="{{ route('loan_products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('loan_products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
