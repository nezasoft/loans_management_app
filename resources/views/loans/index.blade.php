<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>
      
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:20px;">
    <x-button class="ms-4">
    <a href="{{ route('loans.create') }}" class="btn btn-primary">Apply for Loan</a>
    </x-button><br/>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
    </div>
        </div>
    </div>
    </x-app-layout>