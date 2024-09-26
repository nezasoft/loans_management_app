<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-button class="ms-4" style="margin:10px;">
            <a href="{{ route('products.index') }}" class="ms-4">View Customers</a>
            </x-button>
            <h1 style="margin:20px;">Edit Product</h1>
    <form action="{{ route('products.update', $loanProduct->id) }}" method="POST" style="margin:20px;">
        @csrf
        @method('PUT')

        <div class="mt-4">
        <x-label for="name" value="{{ __('Name') }}" />
        <x-input id="name" class="block mt-1" type="text" name="name" value="{{ $loanProduct->name }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="code" value="{{ __('Product Code') }}" />
        <x-input id="code" class="block mt-1" type="text" name="code" value="{{ $loanProduct->code }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="minimum_amount" value="{{ __('Minimum Amount') }}" />
        <x-input id="minimum_amount" class="block mt-1" type="text" name="minimum_amount" value="{{ $loanProduct->minimum_amount }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="maximum_amount" value="{{ __('Minimum Amount') }}" />
        <x-input id="maximum_amount" class="block mt-1" type="text" name="maximum_amount" value="{{ $loanProduct->minimum_amount }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="interest_rate" value="{{ __('Interest Rate') }}" />
        <x-input id="interest_rate" class="block mt-1" type="number" name="interest_rate" value="{{ $loanProduct->interest_rate }}"  required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="currency" value="{{ __('Currency') }}" />
        <x-input id="currency" class="block mt-1" text="text" name="currency" value="{{ $loanProduct->currency }}" required autofocus  />
        </div> <br/>

        <x-button class="ms-4">
                    {{ __('Update Product') }}
        </x-button>
    </form>
    </div>
    </div>
    </div>
    </x-app-layout>
