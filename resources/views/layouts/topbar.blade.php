<nav class="bg-gray-100 shadow-md  mt-">
    <div class="container mx-auto px-4 md:px-6 py-4">
        
        <div class="flex justify-end mb-4 md:mb-0">
            <div class="relative">
                <button class="flex items-center text-gray-700 space-x-2 focus:outline-none" id="userDropdown" data-dropdown-toggle="userMenu">
                    <span class="text-gray-900 text-sm md:inline-block"> {{ Auth::user()->name }} </span>
                    <div class="rounded-full bg-rial p-2 w-8 h-8">
                    <svg class="w-4 h-4 " fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                </button>
                <div id="userMenu" class="hidden absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg py-2 w-48 z-50">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <button data-modal-target="logoutModal" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center">
    <a href="{{ route('dashboard') }}" class="flex flex-col items-center space-y-2 no-underline">
        <img src="{{ asset('img/logo.png') }}" alt="Foto" 
             class="h-14 w-14 rounded-full bg-gray-400 md:h-20 md:w-20 mb-2 animate-wiggle">
        <div class="text-center">
            <h1 class="text-lg md:text-xl font-bold text-rial mb-1">Welcome to GROW COMMUNITY CHURCH</h1>
            <p class="text-xs md:text-sm text-gray-900">Every child is a blessing from God. Let’s guide them with love</p>
        </div>
    </a>
</div>


    
    </div>

    
    <div class="bg-rial w-full h-9 ">
        <!-- <div class="relative  bg-gray-100 py-2 pt-2">
            <div class="absolute animate-marquee flex pt-3">
                <span>God’s love is boundless. Join us and experience His grace at Church every Sunday!</span>
            </div>
        </div> -->
    </div>
</nav>

<!-- Logout Modal -->
<div id="logoutModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full mx-4">
        <div class="p-4 border-b bg-rial">
            <h5 class="text-lg font-medium text-white">Ready to Leave?</h5>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="p-4">
            @csrf
            <p class="text-sm text-gray-600 mb-4">Select "Logout" below if you are ready to end your current session.</p>
            <div class="flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300" data-modal-dismiss="logoutModal">Cancel</button>
                <button type="submit" class="px-4 py-2 rounded bg-rial text-white hover:bg-opacity-90">Logout</button>
            </div>
        </form>
    </div>
</div>


<style>
      @keyframes marquee {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    .animate-marquee {
        animation: marquee 15s linear infinite;
        white-space: nowrap;
    }
.bg-rial{
  
    background-color: #2B263B;
}

.text-rial{
    color: #2B263B;
}

    @keyframes wiggle {
        0%, 100% {
            transform: rotate(-3deg);
        }
        50% {
            transform: rotate(3deg);
        }
    }

    .animate-wiggle {
        animation: wiggle 0.5s infinite;
    }

</style>

<script>
    // Improved dropdown toggle with click outside to close
    document.addEventListener('click', (e) => {
        const dropdown = document.querySelector('#userMenu');
        const dropdownButton = document.querySelector('#userDropdown');
        
        if (!dropdownButton.contains(e.target)) {
            dropdown.classList.add('hidden');
        } else {
            dropdown.classList.toggle('hidden');
        }
    });

    document.querySelectorAll('[data-modal-dismiss="logoutModal"]').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('logoutModal').classList.add('hidden');
    });
    });

    // Improved modal handling
    const modal = document.querySelector('#logoutModal');
    const modalTrigger = document.querySelector('[data-modal-target="logoutModal"]');
    const modalDismiss = document.querySelector('[data-modal-dismiss="logoutModal"]');

    modalTrigger.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    modalDismiss.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Close modal when clicking outside
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
        }
    });
</script>