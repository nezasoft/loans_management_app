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
            <h4 style="margin:20px;">Create Customer</h4>
                <form action="{{ route('customers.store') }}" method="POST" style="margin:20px;">
                    @csrf
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required autofocus  />
                    </div>
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1" type="email" name="email" :value="old('email')" required autofocus  />
                    </div>
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Dob') }}" />
                        <x-input id="dob" class="block mt-1" type="date" name="dob" :value="old('dob')" required autofocus  />
                    </div>
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Phone Number') }}" />
                        <x-input id="phone_number" class="block mt-1" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('ID Number') }}" />
                        <x-input id="id_number" class="block mt-1" type="text" name="id_number" :value="old('id_number')" required autofocus  />
                    </div>
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Address') }}" />
                        <x-input id="address" class="block mt-1" type="text" name="address" :value="old('address')" required autofocus  />
                    </div><br/>
                    <x-button class="ms-4">
                    {{ __('Save Customer') }}
                </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


