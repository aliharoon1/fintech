<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bank Accounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-900 py-10">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-white">Bank Account</h1>
                                    <p class="mt-2 text-sm text-gray-300">A list of all the banks you have attached to your account</p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <a type="button" href="{{ route('bank-accounts.create') }}" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold
                                    text-white hover:bg-indigo-400 focus-visible:outline
                                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add Bank Account</a>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Bank Name</th>
                                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Account</th>
                                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Balance</th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                    <span class="sr-only">Action</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-800">
                                            @if($bankAccounts->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="text-center text-white">No bank accounts found.</td>
                                                </tr>
                                            @else
                                                @foreach($bankAccounts as $bankAccount)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $bankAccount->bank_name }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $bankAccount->account_number }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $bankAccount->balance }}</td>
                                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                            <a href="{{ route('bank-accounts.edit', $bankAccount->id) }}" class="text-blue-500 hover:text-blue-600 mr-2">Edit</a>
                                                            <form class="inline-block" action="{{ route('bank-accounts.destroy', $bankAccount->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
