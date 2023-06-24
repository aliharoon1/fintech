<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bank Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your bank account details") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('bank-accounts.update',$bankAccount->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="bank_name" :value="__('Bank Name')" />
                                <x-text-input id="bank_name" name="bank_name" type="text" class="mt-1 block w-full" :value="old('bank_name', $bankAccount->bank_name)" required autofocus autocomplete="bank_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="account_number" :value="__('Account Number/IBAN')" />
                                <x-text-input id="account_number" name="account_number" type="text" class="mt-1 block w-full" :value="old('account_number', $bankAccount->account_number)" required autofocus autocomplete="account_number" />
                                <x-input-error class="mt-2" :messages="$errors->get('account_number')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Attach') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
