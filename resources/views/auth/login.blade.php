<x-guest-layout>
    
        <!-- Login Container -->
        <div class="bg-smoothgrey w-11/12 max-w-md rounded-xl p-6 shadow-lg">
            <!-- Tabs -->
            <div class="bg-darkgrey rounded-full px-2 py-2 flex justify-between mb-6">
                <a href="{{ route('login') }}" class="w-1/2">
                    <button class="w-full py-2 rounded-full bg-lightgrey text-black font-bold text-sm shadow-sm">
                        Login
                    </button>
                </a>
                <a href="{{ route('register') }}" class="w-1/2">
                    <button class="w-full py-2 rounded-full text-nicegrey font-bold text-sm">
                        Register
                    </button>
                </a>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
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
            class="w-full bg-white outline-none text-sm p-3 rounded-2xl border-smoothgrey focus:outline-none focus:ring-0"
            />
        <x-input-error :messages="$errors->get('email')" class="text-red-500 text-xs" />
    </div>

    <!-- Password Input -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input
            id="password"
            type="password"
            name="password"
            placeholder="Enter your password"
            required
            class="w-full bg-white outline-none text-sm p-3 rounded-2xl border-smoothgrey focus:outline-none focus:ring-0"
            />
        <x-input-error :messages="$errors->get('password')" class="text-red-500 text-xs" />
    </div>

    <!-- Remember Me & Forgot Password -->
    <div class="flex justify-between items-center mb-4">
        <label class="flex items-center text-sm">
            <input type="checkbox" name="remember" class="mr-2 rounded border" />
            Remember me
        </label>
        <a href="{{ route('password.request') }}" class="text-darkgrey text-sm font-bold">
            Forgot Password?
        </a>
    </div>

    <!-- Sign In Button -->
    <button class="w-full py-2 rounded-lg bg-darkgrey text-smoothergrey font-bold text-sm shadow-md hover:bg-opacity-90">
        Sign In
    </button>
</form>

            <!-- Terms and Conditions -->
            <p class="text-xs text-center mt-4">
                By continuing, you agree to our terms of service and privacy policy.
            </p>
        </div>
</x-guest-layout>

<style>
    input:focus {
    outline: none;
    border: none;
}

@keyframes wiggle {
    0%, 100% {
        transform: rotate(-4deg);
    }
    50% {
        transform: rotate(4deg);
    }
}

.animate-wiggle {
    animation: wiggle 0.5s ease-in-out infinite;
}
</style>

<!-- Include Footer -->
@include('layouts.footer')
