<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-button class="ms-4" style="margin:10px;">
            <a href="{{ route('loans.index') }}" class="ms-4">View Loans</a>
            </x-button>

    <form action="{{ route('loans.store') }}" method="POST" style="margin:20px;">
        @csrf
        <div class="mt-4">
            <x-label for="customer_id" value="{{ __('Customer') }}" />
            <select name="customer_id" id="customer_id" class="block mt-1">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <x-label for="loan_product_id" value="{{ __('Customer') }}" />
            <select name="loan_product_id" id="loan_product_id" class="block mt-1">
               @foreach ($loanProducts as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}  </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
        <x-label for="amount" value="{{ __('Loan Amount') }}" />
        <x-input id="amount" class="block mt-1" type="text" name="amount"  required autofocus  />
        </div>
        <br/>
        <x-button class="ms-4">
        {{ __('Save Loan Application') }}
        </x-button>
    </form>
    </x-app-layout>