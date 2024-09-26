<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Loan Statement') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:20px;">
            <strong><h4>Loan Report for {{ $customer->name }}</h4></strong><br/>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>Loan Product</th>
                <th>Amount Disbursed</th>
                <th>Amount Repaid</th>
                <th>Balance</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->loanProduct->name }}</td>
                    <td>{{ $loan->amount_disbursed }}</td>
                    <td>{{ $loan->amount_repaid }}</td>
                    <td>{{ $loan->balance }}</td>
                    <td>{{ ucfirst($loan->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Summary:</h3>
    <p>Total Amount Disbursed: {{ $totalDisbursed }}</p>
    <p>Total Amount Repaid: {{ $totalRepaid }}</p>
    <p>Total Balance: {{ $totalBalance }}</p>


    </div>
        </div>
    </div>
    </x-app-layout>
