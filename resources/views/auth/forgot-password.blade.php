<x-guest-layout>
    <div class="w-full h-full flex flex-col items-center justify-center">

        <!-- Information Text -->
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just send your email.  ') }}
        </div>

        <!-- Status Message -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form Container -->
        <div class="bg-smoothgrey w-11/12 max-w-md rounded-xl p-6 shadow-lg">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autofocus
                        class="w-full bg-white outline-none text-sm p-3 rounded-2xl"
                    />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <button class="w-full py-2 rounded-lg bg-darkgrey text-smoothergrey font-bold text-sm shadow-md hover:bg-opacity-90">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<!-- Include Footer -->
@include('layouts.footer')