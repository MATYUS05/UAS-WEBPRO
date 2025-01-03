<x-app-layout>
    <x-slot name="header">
        <div class="bg-rial py-6 px-8 rounded-lg shadow-lg">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Profile Management') }}
            </h2>
            <p class="text-sm text-gray-200 ">Manage your account settings and preferences</p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 pt-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Update Profile Information and Password -->
        <div class="grid grid-cols-2 gap-8">
            <!-- Update Profile Information -->
            <div class="p-6 bg-white shadow-lg rounded-lg border-l-4 border-rial">
                <!-- <h3 class="text-xl font-bold text-rial mb-4">Update Profile Information</h3> -->
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white shadow-lg rounded-lg border-l-4 border-rial">
                <!-- <h3 class="text-xl font-bold text-rial mb-4">Update Password</h3> -->
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Delete User -->
        <div class="p-6 bg-white shadow-lg rounded-lg border-l-4 w-7xl ">
            <!-- <h3 class="text-xl font-bold text-rial mb-4">Delete Account</h3> -->
         
            <div class="w-full">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

</x-app-layout>

<style>
    .bg-rial {
        background-color: #2B263B;
    }
</style>