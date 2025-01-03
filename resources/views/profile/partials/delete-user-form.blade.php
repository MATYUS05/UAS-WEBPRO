<section class="bg-white shadow-lg rounded-lg border-l-4 border-rial p-6 space-y-6 w-full">
    <header>
        <h2 class="text-xl font-bold text-rial">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-sm text-gray-600 mb-4">
                    Permanently delete your account. This action cannot be undone.
                </p>    
        <p class="mt-2 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Delete Button -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-rial text-white hover:bg-gray-800 px-4 py-2 rounded"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <!-- Modal Confirmation -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
            @csrf
            @method('delete')

            <!-- Confirmation Message -->
            <h2 class="text-lg font-bold text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>
          
            <p class="text-sm text-gray-600">
                
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <!-- Password Input -->
            <div>
                <x-input-label for="password" value="{{ __('Password') }}" class="text-gray-900" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full border-gray-300 rounded focus:ring focus:ring-rial"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-4">
                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-200"
                >
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-rial text-white hover:bg-gray-800 px-4 py-2 rounded">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
