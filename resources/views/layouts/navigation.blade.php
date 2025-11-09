<nav x-data="{ open: false }" class="fixed w-fit bg-white/50 backdrop-blur-md border border-zinc-300 rounded-lg top-8 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl p-4">
        <div class="flex items-center gap-12 justify-center">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center gap-2 text-2xl font-semibold mix-blend-difference">
                    <h1>
                        <a href="/">
                            <x-application-logo />
                        </a>
                        
                    </h1>
                    @if (Route::is('admin.index', 'products.create', 'products.edit'))
                        - Admin dashboard
                    @endif
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 lg:space-x-4 sm:-my-px sm:ms-10 sm:flex">

                    @if (Route::is('admin.index', 'products.create', 'products.edit'))
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <x-nav-link :href="route('home.index')" :active="request()->routeIs('home')">
                                {{ __('Back to home') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                                {{ __('dashboard') }}
                            </x-nav-link>

                            <x-nav-link href="/admin#products">
                                {{ __('Daftar buku') }}
                            </x-nav-link>

                            <x-nav-link href="/admin#orders">
                                {{ __('Pinjaman') }}
                            </x-nav-link>
                        @endif
                    @else
                        <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.index')">
                            {{ __('Home') }}
                        </x-nav-link>

                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                            {{ __('Daftar buku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                            {{ __('Artikel Litra.') }}
                        </x-nav-link>
                        <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                            {{ __('Artikel pembaca') }}
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <div class="flex gap-2 md:gap-2 items-center">

                @if (Route::is('admin.index', 'products.create', 'products.edit'))
                @else
                @endif

                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <!-- Settings Dropdown -->
                            <div class="hidden sm:flex sm:items-center">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-zinc-300 text-sm leading-4 font-medium rounded-md bg-white/65 backdrop-blur-md hover:text-zinc-800 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        @if (Auth::user()->role === 'admin')
                                            <x-dropdown-link :href="route('admin.index')">
                                                {{ __('Admin dashboard') }}
                                            </x-dropdown-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <div class="flex gap-2">
                                <a href="{{ route('login') }}">
                                    <x-secondary-button>Login</x-secondary-button>
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <x-primary-button>Register</x-primary-button>
                                    </a>
                                @endif
                            </div>
                        @endauth
                    </nav>
                @endif


                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-zinc-950 hover:text-zinc-800 focus:text-zinc-700 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            {{-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div> --}}

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1">
                <div class="px-4">
                    @auth
                        <div class="font-medium text-base">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-zinc-700">
                            {{ Auth::user()->email }}
                        </div>
                    @else
                        <div class="font-medium text-base">
                            Guest
                        </div>
                        <div class="font-medium text-sm">
                            Not logged in
                        </div>
                    @endauth
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
