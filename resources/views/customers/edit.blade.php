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
            <a href="{{ route('customers.index') }}" class="ms-4">View Customers</a>
            </x-button>
            <h1 style="margin:20px;">Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST"  style="margin:20px;">
        @csrf
        @method('PUT')

        <div class="mt-4">
        <x-label for="name" value="{{ __('Name') }}" />
        <x-input id="name" class="block mt-1" type="text" name="name" value="{{ $customer->name }}" required autofocus/>
        </div>
        <div class="mt-4">
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1" type="email" name="email" value="{{ $customer->email }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="dob" value="{{ __('Dob') }}" />
        <x-input id="dob" class="block mt-1" type="text" name="dob" value="{{ $customer->dob }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="phone_number" value="{{ __('Phone Number') }}" />
        <x-input id="phone_number" class="block mt-1" type="text" name="phone_number" value="{{ $customer->phone_number }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="id_number" value="{{ __('ID Number') }}" />
        <x-input id="id_number" class="block mt-1" type="text" name="id_number" value="{{ $customer->id_number }}" required autofocus  />
        </div>
        <div class="mt-4">
        <x-label for="address" value="{{ __('Address ') }}" />
        <x-input id="address" class="block mt-1" type="text" name="address" value="{{ $customer->address }}" required autofocus  />
        </div><br/>
        <x-button class="ms-4">
        {{ __('Update Customer') }}
        </x-button>
    </form>
    </div>
    </div>
    </div>
</x-app-layout>
