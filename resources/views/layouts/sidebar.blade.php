<nav class="bg-gray-100 text-gray-900 py-4 mb-4">
    <div class="container mx-auto px-4">
        <ul class="navbar-menu flex flex-wrap justify-center gap-6 md:gap-8 lg:gap-14">
            @if (Auth::user()->role == 'Admin')
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <a href="{{ route('users.index') }}" class="mt-2 block text-sm hover:underline">Users</a>
            </li>
            @endif
            <li class="text-center group w-16 h-16">
                <div class="rounded-full bg-rial p-3 animate-wiggle">
                    <i class="fa fa-child text-white w-7 h-7 pt-1 fa-lg"></i>
                </div>
                <a href="{{ route('children.index') }}" class="mt-2 block text-sm hover:underline">Children</a>
            </li>
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <a href="{{ route('class_categories.index') }}" class="mt-2 block text-sm hover:underline">Class</a>
            </li>
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <a href="{{ route('events.index') }}" class="mt-2 block text-sm hover:underline">Event</a>
            </li>
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <a href="{{ route('notes.index') }}" class="mt-2 block text-sm hover:underline">Note</a>
            </li>
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3">
                    <i class="fa fa-book text-white fa-lg"></i>
                </div>
                <a href="{{ route('renungans.index') }}" class="mt-2 block text-sm hover:underline">Renungan</a>
            </li>
            @if (Auth::user()->role == 'Admin')
            <li class="text-center group    ">
                <div class="rounded-full bg-rial p-3 w-16 h-16 ">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <a href="{{ route('attendances.index') }}" class="mt-2 block text-sm hover:underline">Attend Child</a>
            </li>
            
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3 w-16 h-16">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <a href="{{ route('attendances.indexkaka') }}" class="mt-2 block text-sm hover:underline">Attend Kaka</a>
            </li>
            @endif
            <li class="text-center group">
                <div class="rounded-full bg-rial p-3 animate-wiggle">
                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <a href="{{ route('attendances.history') }}" class="mt-2 block text-sm hover:underline">History</a>
            </li>
        </ul>
    </div>
</nav>

<style>

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
.bg-rial {
    background-color: #2B263B;
}
.bg-rial{
    background-color: #2B263B;
}

</style>