@extends('layouts.app')

@section('content')
    <h1>Loan Applications</h1>
    <a href="{{ route('loans.create') }}" class="btn btn-primary">Apply for Loan</a>
    <table class="table">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Loan Product</th>
                <th>Amount</th>
                <th>Interest Rate</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->customer->name }}</td>
                    <td>{{ $loan->loanProduct->name }}</td>
                    <td>{{ $loan->amount }}</td>
                    <td>{{ $loan->interest_rate }}%</td>
                    <td>{{ $loan->status }}</td>
                    <td>
                        @if ($loan->status === 'pending')
                            <form action="{{ route('loans.approve', $loan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                        @endif
                        @if ($loan->status === 'approved')
                            <form action="{{ route('loans.disburse', $loan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">Disburse</button>
                            </form>
                        @endif
                        @if ($loan->status === 'disbursed')
                            <form action="{{ route('loans.repay', $loan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Mark as Repaid</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
