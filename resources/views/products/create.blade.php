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
            <a href="{{ route('products.index') }}" class="ms-4">View Products</a>
            </x-button>

            <h4 style="margin:20px;">Create Loan Product</h4>
    

    <form action="{{ route('products.store') }}" method="POST" style="margin:20px;">
        @csrf

        <div class="mt-4">
        <x-label for="name" value="{{ __('Name') }}" />
        <x-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="code" value="{{ __('Product Code') }}" />
        <x-input id="code" class="block mt-1" type="text" name="code" :value="old('code')" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="minimum_amount" value="{{ __('Minimum Amount') }}" />
        <x-input id="minimum_amount" class="block mt-1" type="text" name="minimum_amount" :value="old('minimum_amount')" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="maximum_amount" value="{{ __('Minimum Amount') }}" />
        <x-input id="maximum_amount" class="block mt-1" type="text" name="maximum_amount" :value="old('maximum_amount')" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="interest_rate" value="{{ __('Interest Rate') }}" />
        <x-input id="interest_rate" class="block mt-1" type="number" name="interest_rate" :value="old('interest_rate')" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="currency" value="{{ __('Currency') }}" />
        <x-input id="currency" class="block mt-1" text="text" name="currency" :value="old('currency')" required autofocus  />
        </div>
        <x-button class="ms-4">
                    {{ __('Save Product') }}
        </x-button>
    </form>
    </div>
        </div>
    </div>
</x-app-layout>