<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:20px;">
<x-button class="ms-4">
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Create New</a>
</x-button><br/>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Phone Number</th>
                <th>ID Number</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->dob }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>{{ $customer->id_number }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>

                        </form>
                        <a href="{{ route('loans.report', $customer->id) }}" class="btn btn-warning btn-sm">Loan Statement</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        </div>
    </div>
</x-app-layout>
